<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCommentForm;
use App\Models\Admin\Blog\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['category', 'tags'])
            ->where('status', 'published')
            ->orderBy('id', 'desc')
            ->paginate(4);

        return view('front.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)
            ->with('comments')
            ->firstOrFail();

        $comments = $post->comments;

        $post->views++;
        $post->update();

        return view('front.blog.page', compact('post', 'comments'));
    }

    public function comment($id, BlogCommentForm $request)
    {
        $post = BlogPost::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect()->route('blog.page', $post->slug);
    }
}
