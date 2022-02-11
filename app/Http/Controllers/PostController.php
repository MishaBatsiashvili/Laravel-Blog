<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostView;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $categories = Category::all();
        $posts = Post::latest()
            ->where('status', 1)
            ->filter(request(['search', 'category', 'author']))
            ->paginate(4);

        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function show(Post $post){
        $isBookmarked = false;
        // add to views count
        if(auth()->user()){
            // check if post is already viewed
            $postAlreadyViewed = PostView::where('user_id', auth()->user()->id)
                ->where('post_id', $post->id)
                ->count();

            // if post not yet viewed by currently logged in user
            // then add current user to post_views
            if(!$postAlreadyViewed){
                PostView::create([
                    'user_id' => auth()->user()->id,
                    'post_id' => $post->id
                ]);
            }

            $res = Bookmark::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
            if($res){
                $isBookmarked = true;
            }
        }

        // converting markdown into html
        $post->body = Markdown::parse($post->body);
        // /.

        return view('posts.show', [
            'post' => $post,
            'isBookmarked' => $isBookmarked,
        ]);
    }
}
