<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('frontend.post', ['post' => $post]);
    }
}
