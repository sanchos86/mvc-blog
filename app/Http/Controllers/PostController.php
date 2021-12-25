<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        if (is_null($post->published_at)) {
            abort(404);
        }

        return view('frontend.post', [
            'post' => $post,
            'meta' => [
                'description' => $post->meta_description,
            ],
        ]);
    }
}
