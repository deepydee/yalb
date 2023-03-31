<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blog\BlogTag;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    public function show($slug) {
        $tag = BlogTag::where('slug', $slug)
            ->firstOrFail();

        $posts = $tag->posts()
            ->with('category')
            ->orderBy('id', 'desc')
            ->paginate(4);

            return view('front.blog.tag', compact('tag', 'posts'));
    }
}
