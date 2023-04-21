<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\BlogCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::latest()
            ->paginate(20);

        return view('admin.blog.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        BlogCategory::create($request->all());
        // $request->session()->flash('success', 'Категория добавлена');

        return redirect()->route('admin.blog.categories.index')
                         ->with('success', "Категория \"{$request->title}\" успешно добавлена");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $category)
    {
       return view('admin.blog.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategory $category, Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.blog.categories.index')
                         ->with('success', "Категория \"{$request->title}\" успешно отредактирована");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $category)
    {
        if ($category->posts->count()) {
            return back()->with('error', 'У категории есть записи');
        }

        $category->delete();

        return redirect()->route('admin.blog.categories.index')
                         ->with('success', "Категория \"{$category->title}\" успешно удалена");
    }
}
