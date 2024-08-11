<?php

use App\Http\Controllers\Admin\Post\CreateController;
use App\Http\Controllers\Admin\Post\DestroyController;
use App\Http\Controllers\Admin\Post\EditController;
use App\Http\Controllers\Admin\Post\IndexController;
use App\Http\Controllers\Admin\Post\ShowController;
use App\Http\Controllers\Admin\Post\StoreController;
use App\Http\Controllers\Admin\Post\UpdateController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/delete/{post}', [PostController::class, 'destroy'])->name('post.delete');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', [IndexController::class, '__invoke'])->name('admin.post.index');
        Route::get('/post/create', [CreateController::class, '__invoke'])->name('admin.post.create');
        Route::post('/post', [StoreController::class, '__invoke'])->name('admin.post.store');
        Route::get('/post/{post}', [ShowController::class, '__invoke'])->name('admin.post.show');
        Route::get('edit/post/{post}', [EditController::class, '__invoke'])->name('admin.post.edit');
        Route::patch('/post/{post}', [UpdateController::class, '__invoke'])->name('admin.post.update');
        Route::get('/delete/post/{post}', [DestroyController::class, '__invoke'])->name('admin.post.delete');
    });

});


