<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, AboutController, PostsController, CategoryPostsController, TagPostsController};

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/posts/{post:slug}', [PostsController::class, 'show'])->name('post-by-slug');

Route::get('/tags/{tag:slug}', [TagPostsController::class, 'index'])->name('posts-by-tag');

Route::get('/categories/{category:slug}', [CategoryPostsController::class, 'index'])->name('posts-by-category');

Route::get('/backend/login', function () {
    return 'login';
})->name('login');

// TODO add
Route::group(['prefix' => 'backend'], function () {
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', function () {
           return 1;
        });

        Route::get('/{id}', function () {
            return 2;
        });

        Route::get('/{id}/edit', function () {
            return 3;
        });
    });

    Route::group(['prefix' => 'tags'], function () {});

    Route::group(['prefix' => 'categories'], function () {});
});
