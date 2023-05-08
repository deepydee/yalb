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
            ->latest()
            ->paginate(4);

        return view('front.blog.index', compact('posts'));
    }

    public function show(BlogPost $blogPost)
    {
        $comments = $blogPost->load('comments');
        $media = $blogPost->getFirstMedia('images');

        $blogPost->views++;
        $blogPost->update();

        return view('front.blog.page', compact('blogPost', 'media'));
    }

    public function comment(BlogPost $blogPost, BlogCommentForm $request)
    {
        $blogPost->comments()->create($request->validated());

        return redirect()->route('blog.page', $blogPost);
    }
}
