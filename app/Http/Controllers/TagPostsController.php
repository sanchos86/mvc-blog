<?php

namespace App\Http\Controllers;

use App\Models\{Tag, Post};

class TagPostsController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = Post::whereNotNull('published_at')->whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id);
        })->paginate();

        return view('frontend.posts', [
            'title' => $tag->name,
            'posts' => $posts,
            'headingTitle' => $tag->name,
            'meta' => [
                'description' => $tag->meta_description,
            ],
        ]);
    }
}
