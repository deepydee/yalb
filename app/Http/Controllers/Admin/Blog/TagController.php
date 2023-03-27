<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\BlogTag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = BlogTag::paginate(20);

        return view('admin.blog.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        BlogTag::create($request->all());

        return redirect()->route('admin.blog.tags.index')
                         ->with('success', "Тег \"{$request->title}\" успешно добавлен");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = BlogTag::find($id);

        return view('admin.blog.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $tag = BlogTag::find($id);
        $tag->update($request->all());

        return redirect()->route('admin.blog.tags.index')
                         ->with('success', "Тег \"{$request->title}\" успешно отредактирован");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = BlogTag::find($id);

        if ($tag->posts->count()) {
            return back()->with('error', 'У тега есть записи');
        }

        return redirect()->route('admin.blog.tags.index')
        ->with('success', "Тег \"{$tag->title}\" успешно удален");
    }
}
