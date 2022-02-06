<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewPost;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostView;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminPostsController extends Controller
{
    public function index(){
        $posts = Post::latest()->where('user_id', auth()->user()->id)->get();
        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function generateValidator($request, $isEdit = false){
        return [
            'title' => 'string|required|max:255',
            'body' => 'string|required',
            'excerpt' => 'string',
            'category_id' => $request->category_id === null ? [] : ['string', Rule::exists('categories', 'id')],
            'status' => [Rule::in(["1", "0"])],
            'thumbnail' => $isEdit ? 'image|max:512' : 'required|image|max:512'
        ];
    }

    private function sendPostPublishedMail($post){
        $user = request()->user();
        $followers = $user->followers;
        Mail::to('users@michaelbacy.com')
            ->bcc($followers)
            ->send(new NewPost($user->name, $post));
    }

    public function store(Request $request){
        $attr = $request->validate($this->generateValidator($request));
        $attr['user_id'] = auth()->user()->id;
        $attr['thumbnail'] = $attr['thumbnail']->store('thumbnails');

        $post = Post::create($attr);

        if($post && $attr['status'] === '1'){
            $this->sendPostPublishedMail($post);
            return redirect(route('dashboard'))->with([
                'success' => [
                    'primary' => 'Post Published',
                    'secondary' => 'Your followers will be notified via email'
                ]
            ]);
        }

        return redirect(route('dashboard'));
    }

    public function edit(Post $post){
        if($post->user_id !== auth()->user()?->id){
            return redirect('/');
        }

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }


    public function update(Request $request, Post $post){
        $attr = $request->validate($this->generateValidator($request, true));
        if(isset($attr['thumbnail'])){
            $attr['thumbnail'] = $attr['thumbnail']->store('thumbnails');
        }

        $post->update($attr);

        if($post && $attr['status'] === '1'){
            $this->sendPostPublishedMail($post);
            return redirect(route('dashboard'))->with([
                'success' => [
                    'primary' => 'Post Published',
                    'secondary' => 'Your followers will be notified via email'
                ]
            ]);
        }

        return redirect(route('dashboard'));
    }

    public function destroy(Post $post){
        $flashed = [];

        try{
            PostView::where('post_id', $post->id)->delete();
            $delete = $post->delete();
            if($delete){
                $flashed = [
                    'success' => [
                        'primary' => 'Post Deleted'
                    ]
                ];
            }
        } catch (Exception $e) {

        }

        return redirect(route('dashboard'))->with($flashed);
    }
}
