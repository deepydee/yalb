<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog\BlogCategory;
use App\Models\Admin\Blog\BlogPost;
use App\Models\Admin\Blog\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
            'status' => 'nullable',
            'is_featured' => 'nullable',
        ]);

        $status = $request->boolean('status') ?
            'published' :
            'draft';
        $isFeatured = $request->boolean('is_featured');

        if ($status === 'draft' && $isFeatured) {
            !$isFeatured;
        }

        $data = [
            ...$request->all(),
            'thumbnail' => BlogPost::uploadImage($request),
            'status' => $status,
            'is_featured' => $isFeatured,
        ];

        $post = BlogPost::create($data);
        $post->tags()->sync($request->tags);

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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
            'status' => 'nullable',
            'is_featured' => 'nullable',
        ]);


        $post = BlogPost::find($id);

        $data = [
            ...$request->all(),
            'status' => $request->boolean('status') ?
                        'published' :
                        'draft',
            'is_featured' => $request->boolean('is_featured')
        ];

        if ($file = BlogPost::uploadImage($request, $post->thumbnail)) {
           $data['thumbnail'] = $file;
        }

        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('admin.blog.posts.index')
                         ->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = BlogPost::find($id);
        $post->tags()->sync([]);

        if ($post->thumbnail) {
            Storage::delete($post->thumbnail);
        }
        $post->delete();

        return redirect()->route('admin.blog.posts.index')
                         ->with('success', 'Статья удалена');
    }
}
