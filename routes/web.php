<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as FrontendHomeController;
use App\Http\Controllers\PostController as FrontendPostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryPostsController;
use App\Http\Controllers\TagPostsController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\PostController as BackendPostController;
use App\Http\Controllers\Backend\AuthenticatedSessionController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\CategoryController;

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

Route::get('/', [FrontendHomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/posts/{post:slug}', [FrontendPostController::class, 'show'])->name('post-by-slug');

Route::get('/tags/{tag:slug}', [TagPostsController::class, 'index'])->name('posts-by-tag');

Route::get('/categories/{category:slug}', [CategoryPostsController::class, 'index'])->name('posts-by-category');

/** ---------- **/

Route::group(['prefix' => 'backend'], function () {
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'index'])->name('login');

        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', [BackendHomeController::class, 'index'])->name('backend-home');

        Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', [BackendPostController::class, 'index'])->name('posts-index');

            Route::get('/create', [BackendPostController::class, 'create'])->name('posts-create');

            Route::post('/', [BackendPostController::class, 'store'])->name('posts-store');

            Route::get('/{post}/edit', [BackendPostController::class, 'edit'])->name('posts-edit');

            Route::put('/{post}', [BackendPostController::class, 'update'])->name('posts-update');

            Route::patch('/{post}/publish', [BackendPostController::class, 'publish'])->name('posts-publish');

            Route::delete('/{post}', [BackendPostController::class, 'destroy'])->name('posts-destroy');
        });

        Route::group(['prefix' => 'tags'], function () {
            Route::get('/', [TagController::class, 'index'])->name('tags-index');

            Route::get('/create', [TagController::class, 'create'])->name('tags-create');

            Route::post('/', [TagController::class, 'store'])->name('tags-store');

            Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tags-edit');

            Route::patch('/{tag}', [TagController::class, 'update'])->name('tags-update');

            Route::delete('/{tag}', [TagController::class, 'destroy'])->name('tags-destroy');
        });

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories-index');

            Route::get('/create', [CategoryController::class, 'create'])->name('categories-create');

            Route::post('/', [CategoryController::class, 'store'])->name('categories-store');

            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories-edit');

            Route::patch('/{category}', [CategoryController::class, 'update'])->name('categories-update');

            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories-destroy');
        });
    });

    Route::fallback(function () {
        return redirect()->route('backend-home');
    });
});
