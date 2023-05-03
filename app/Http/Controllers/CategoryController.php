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
    public function show(Category $category): View
    {
        $products = $category->products()
            ->with('attributes')
            ->paginate(25);

        return view('categories.show', compact('products'));
    }
}
