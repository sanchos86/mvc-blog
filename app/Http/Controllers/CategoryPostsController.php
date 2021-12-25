<?php

namespace App\Http\Controllers;

use App\Models\{Category, Post};

class CategoryPostsController extends Controller
{
    public function index(Category $category)
    {
        $posts = Post::whereNotNull('published_at')->where('category_id', $category->id)->paginate();

        return view('frontend.posts', [
            'title' => $category->name,
            'posts' => $posts,
            'headingTitle' => $category->name,
            'meta' => [
                'description' => $category->meta_description,
            ],
        ]);
    }
}
