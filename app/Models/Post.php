<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getPublishTimeAttribute($value){
        return Carbon::create($this->created_at)->format('jS \\of F Y');
    }

    // this is query scope
    public function scopeFilter($query, array $filters = []){ // Post::newQuery->filter()
        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where(function ($query) use ($search){
                $query
                    ->where('title', 'like', '%'.$search.'%')
                    ->orWhere('excerpt', 'like', '%'.$search.'%')
                    ->orWhere('body', 'like', '%'.$search.'%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category_slug){
            /*
            $query->whereExists(function($query) use ($category_slug){
                $query
                 ->from('categories')
                 ->whereColumn('categories.id', 'posts.category_id')
                 ->where('categories.slug', $category_slug);
            });
            */

            // code below is the same as code above, code below
            // just uses laravel's tools to make it more readable
            $query->whereHas('category', function($query) use ($category_slug){
                $query->where('slug', $category_slug);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $username){
            $query->whereHas('author', function($query) use ($username){
                $query->where('username', $username);
            });
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function views(){
        return $this->hasMany(PostView::class, 'post_id', 'user_id');
    }

    public function viewsCount(){
        return $this->views()->count();
    }
}
