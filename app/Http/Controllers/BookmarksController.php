<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookmarksController extends Controller
{
    public function index(){
        $posts = Post::select('posts.id as id', 'title', 'category_id', 'status')
            ->join('bookmarks', 'bookmarks.post_id', '=', 'posts.id')
            ->where('bookmarks.user_id', auth()->user()->id)
            ->paginate(15);

        return view('admin.bookmarks.index', [
            'posts' => $posts,
            'categories' => Category::all()
        ]);
    }

    public function destroy($id){
        Bookmark::where('post_id', $id)->delete();
        return redirect()->back();
    }

    public function store($post_id){
        Bookmark::create([
            'user_id' => request()->user()->id,
            'post_id' => $post_id
        ]);
        return redirect()->back();
    }
}
