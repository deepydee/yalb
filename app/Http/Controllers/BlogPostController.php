<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('front.blog.index');
    }

    public function show()
    {
        return view('front.blog.page');
    }
}
