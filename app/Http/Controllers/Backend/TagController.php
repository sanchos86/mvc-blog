<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('backend.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.tags.create');
    }

    public function store(TagRequest $request): RedirectResponse
    {
        $params = $request->only([
            'name',
            'slug',
            'meta_title',
            'meta_description',
        ]);
        Tag::create($params);
        return redirect()->route('tags-index');
    }

    public function edit(Tag $tag)
    {
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {
        $params = $request->only([
            'name',
            'slug',
            'meta_title',
            'meta_description',
        ]);
        $tag->update($params);
        return redirect()->route('tags-index');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return redirect()->back();
    }
}
