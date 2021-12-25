<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\{Post, Tag, Category};
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Post\{PostCreateRequest, PostUpdateRequest};

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();
        return view('backend.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('backend.posts.create', compact('tags', 'categories'));
    }

    public function store(PostCreateRequest $request): RedirectResponse
    {
        $params = $request->only([
            'title',
            'text',
            'slug',
            'category_id',
            'plain_text',
            'meta_title',
            'meta_description',
        ]);
        $src = $request->file('picture')->store(null);
        $params['src'] = $src;

        $publish = $request->boolean('publish');

        $post = new Post($params);
        $post->togglePublish($publish);
        $post->save();
        $post->tags()->attach($request->get('tags'));

        return redirect()->route('posts-index');
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('backend.posts.edit', compact('post', 'tags', 'categories'));
    }

    public function update(PostUpdateRequest $request, Post $post): RedirectResponse
    {
        $params = $request->only([
            'title',
            'text',
            'slug',
            'category_id',
            'plain_text',
            'meta_title',
            'meta_description',
        ]);

        if ($request->hasFile('picture')) {
            $src = $request->file('picture')->store(null);
            $params['src'] = $src;
        }

        $publish = $request->boolean('publish');

        $post->togglePublish($publish);
        $post->update($params);
        $post->tags()->sync($request->get('tags'));

        return redirect()->route('posts-index');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts-index');
    }

    public function publish(Post $post): RedirectResponse
    {
        $post->togglePublish(!boolval($post->published_at));
        return redirect()->back();
    }
}
