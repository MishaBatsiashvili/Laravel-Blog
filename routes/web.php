<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountImageController;
use App\Http\Controllers\Admin\AdminPostsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\BookmarksController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware('auth')->group(function(){
    Route::prefix('/bookmarks')->name('bookmarks.')->group(function(){
        Route::get('/', [BookmarksController::class, 'index'])->name('index');
        Route::delete('/{id}', [BookmarksController::class, 'destroy'])->name('destroy');
        Route::post('/{post_id}', [BookmarksController::class, 'store'])->name('store');
    });

    Route::prefix('/account')->name('account.')->group(function(){
        Route::get('/', [AccountController::class, 'index'])->name('index');

        Route::prefix('/name')->name('name.')->group(function(){
            Route::put('/', [AccountController::class, 'update'])->name('update');
        });

        Route::prefix('/image')->name('image.')->group(function(){
            Route::post('/', [AccountImageController::class, 'store'])->name('store');
        });
    });
});

Route::middleware('admin')->group(function(){
    // posts
    Route::get('admin/dashboard', [AdminPostsController::class, 'index'])->name('dashboard');

    Route::get('admin/posts/create', [AdminPostsController::class, 'create'])->name('post.create');
    Route::get('admin/posts', [AdminPostsController::class, 'index'])->name('post.index');
    Route::post('admin/posts', [AdminPostsController::class, 'store'])->name('post.store');

    Route::get('admin/posts/{post}/edit', [AdminPostsController::class, 'edit'])->name('post.edit');
    Route::put('admin/posts/{post}/edit', [AdminPostsController::class, 'update']);
    Route::delete('admin/posts/{post}/delete', [AdminPostsController::class, 'destroy'])->name('post.destroy');
    // /.

    // categories
    Route::get('admin/categories', [AdminCategoriesController::class, 'index'])->name('admin.categories.index');

    Route::get('admin/categories/{category}/edit', [AdminCategoriesController::class, 'edit'])->name('admin.category.edit');
    Route::put('admin/categories/{category}', [AdminCategoriesController::class, 'update'])->name('admin.category.update');
    Route::delete('admin/categories/{category}', [AdminCategoriesController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('admin/categories/create', [AdminCategoriesController::class, 'create'])->name('admin.category.create');
    Route::post('admin/categories', [AdminCategoriesController::class, 'store'])->name('admin.category.store');

});

Route::post('users/{user}/follow', [FollowController::class, 'store'])->name('follow');
Route::delete('users/{user}/follow', [FollowController::class, 'destroy']);

Route::prefix('newsletter')->name('newsletter.')->group(function(){
    Route::post('/', [NewsletterController::class, 'store'])->name('store');
    Route::post('/ping', [NewsletterController::class, 'ping'])->name('ping');
    Route::get('/followers', [NewsletterController::class, 'sendToFollowers'])->name('followers');
});

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');
Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

require __DIR__.'/auth.php';
