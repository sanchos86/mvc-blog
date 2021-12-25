<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $params = $request->only([
            'name',
            'slug',
            'meta_title',
            'meta_description',
        ]);
        Category::create($params);
        return redirect()->route('categories-index');
    }

    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $params = $request->only([
            'name',
            'slug',
            'meta_title',
            'meta_description',
        ]);
        $category->update($params);
        return redirect()->route('categories-index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->back();
    }
}
