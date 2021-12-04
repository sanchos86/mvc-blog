<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = is_numeric($request->query('per-page')) ? $request->query('per-page') : null;
        $posts = Post::whereNotNull('published_at')->paginate($perPage);

        return view('frontend.posts', [
            'title' => 'Главная',
            'posts' => $posts,
            'headingTitle' => 'Последние записи'
        ]);
    }
}
