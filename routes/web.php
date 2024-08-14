<?php

use App\Http\Controllers\Admin\Post\CreateController;
use App\Http\Controllers\Admin\Post\DestroyController;
use App\Http\Controllers\Admin\Post\EditController;
use App\Http\Controllers\Admin\Post\IndexController;
use App\Http\Controllers\Admin\Post\ShowController;
use App\Http\Controllers\Admin\Post\StoreController;
use App\Http\Controllers\Admin\Post\UpdateController;
use App\Http\Controllers\Admin\Role\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

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

        Route::get('/role', [RoleController::class, 'index'])->name('admin.role.index');
        Route::get('/create/role', [RoleController::class, 'create'])->name('admin.role.create');
        Route::post('/role', [RoleController::class, 'store'])->name('admin.role.store');
        Route::get('/role/{role}', [RoleController::class, 'show'])->name('admin.role.show');
        Route::get('/edit/role/{role}', [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::patch('/role/{role}', [RoleController::class, 'update'])->name('admin.role.update');
        Route::get('/delete/role/{role}', [RoleController::class, 'destroy'])->name('admin.role.delete');
    });
});

require __DIR__ . '/auth.php';
