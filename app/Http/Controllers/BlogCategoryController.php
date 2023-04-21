<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blog\BlogCategory;

class BlogCategoryController extends Controller
{
    function show (BlogCategory $blogCategory) {

        $posts = $blogCategory->posts()
            ->latest()
            ->paginate(4);

        return
            view('front.blog.category',
            ['category' => $blogCategory, 'posts' => $posts]
        );
    }
}
