<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Actions\BlogPostDestroyAction;
use App\Actions\BlogPostUpdateAction;
use App\Actions\BlogPostStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\PostFormRequest;
use App\Models\Admin\Blog\BlogCategory;
use App\Models\Admin\Blog\BlogPost;
use App\Models\Admin\Blog\BlogTag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::with('category', 'tags')->paginate(20);

        return view('admin.blog.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::pluck('title', 'id')->all();
        $tags = BlogTag::pluck('title', 'id')->all();

        return view('admin.blog.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request, BlogPostStoreAction $action)
    {
        $action->handle($request);

        return redirect()->route('admin.blog.posts.index')
                         ->with('success', 'Статья успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = BlogPost::find($id);
        $categories = BlogCategory::pluck('title', 'id')->all();
        $tags = BlogTag::pluck('title', 'id')->all();

        return view('admin.blog.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, BlogPostUpdateAction $action, string $id)
    {
        $post = BlogPost::find($id);
        $action->handle($post, $request);

        return redirect()->route('admin.blog.posts.index')
                         ->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPostDestroyAction $action, string $id)
    {
        $post = BlogPost::find($id);
        $action->handle($post);

        return redirect()->route('admin.blog.posts.index')
                         ->with('success', 'Статья удалена');
    }
}
