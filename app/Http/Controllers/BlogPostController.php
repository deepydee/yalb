<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blog\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['category', 'tags'])
            ->orderBy('id', 'desc')
            ->paginate(4);

        return view('front.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)
            ->firstOrFail(); //->with('category, tags')

        $post->views++;
        $post->update();

        return view('front.blog.page', compact('post'));
    }
}
