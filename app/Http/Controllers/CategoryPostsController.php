<?php

namespace App\Http\Controllers;

use App\Models\{Category, Post};
use Illuminate\Http\Request;

class CategoryPostsController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $perPage = is_numeric($request->query('per-page')) ? $request->query('per-page') : null;
        $posts = Post::whereNotNull('published_at')->where('category_id', $category->id)->paginate($perPage);

        return view('frontend.posts', [
            'title' => $category->name,
            'posts' => $posts,
            'headingTitle' => $category->name
        ]);
    }
}
