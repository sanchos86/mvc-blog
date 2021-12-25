<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::whereNotNull('published_at')->paginate();

        return view('frontend.posts', [
            'title' => 'Главная',
            'posts' => $posts,
            'headingTitle' => 'Последние записи',
            'meta' => [
                'description' => __('meta.home.description'),
            ],
        ]);
    }
}
