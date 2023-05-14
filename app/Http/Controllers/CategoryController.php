<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('index')->with('name', 'home');
    }

    /**
     * Display the specified resource.
     */
    public function show($path): View
    {
        $category = Category::wherePath($path)
            ->with(['ancestors', 'descendants.media', 'media', 'products.attributes'])
            ->firstOrFail();

        $products = $category->products()
            ->with('attributes', 'media')
            ->paginate(8);

        return view('categories.show', compact('category', 'products'));
    }
}
