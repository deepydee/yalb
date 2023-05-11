<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(string $categoryPath, Product $product): View
    {
        $category = Category::wherePath($categoryPath)
            ->firstOrFail()
            ->with('attributes');

        return view('products.show', compact('category', 'product'));
    }
}
