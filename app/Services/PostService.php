<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getLatest()
    {
        return Post::whereNotNull('published_at')->orderByDesc('id')->take(5)->get();
    }
}
