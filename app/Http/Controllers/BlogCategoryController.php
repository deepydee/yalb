<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blog\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    function show ($slug) {

        $category = BlogCategory::where('slug', $slug)
            ->firstOrFail();

        $posts = $category->posts()
                          ->orderBy('id', 'desc')
                          ->paginate(4);

        return view('front.blog.category', compact('category', 'posts'));
    }
}
