<?php

namespace App\Http\Controllers;

use App\Models\{Tag, Post};
use Illuminate\Http\Request;

class TagPostsController extends Controller
{
    public function index(Request $request, Tag $tag)
    {
        $perPage = is_numeric($request->query('per-page')) ? $request->query('per-page') : null;
        $posts = Post::whereNotNull('published_at')->whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id);
        })->paginate($perPage);

        return view('frontend.posts', [
            'title' => $tag->name,
            'posts' => $posts,
            'headingTitle' => $tag->name
        ]);
    }
}
