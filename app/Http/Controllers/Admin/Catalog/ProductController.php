<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::with('categories', 'media')
            ->latest()
            ->paginate(20);

        return view('admin.catalog.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::pluck('title', 'id')->all();
        $attributes = Attribute::all(['id', 'title', 'type']);

        return view(
            'admin.catalog.products.create',
            compact('categories', 'attributes')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $attibutes = array_filter($request->values);
        $attibutes = array_map(fn ($e) => ['value' => $e], $attibutes);

        $product = Product::create($request->validated());
        $category = Category::findOrFail($request->category);
        $product->categories()->sync($category);

        foreach ($attibutes as $key => $value) {
            if ($request->hasFile('values.' . $key)) {
                $product->addMediaFromRequest('values.' . $key)
                    ->toMediaCollection('product_attribute_images');

                $url = $product->getFirstMediaUrl('product_attribute_images');
                $attibutes[$key]['value'] = $url;
            }
        }

        if ($request->hasFile('thumbnail')) {
            $product->addMediaFromRequest('thumbnail')
                     ->toMediaCollection('images');
        }

        $product->attributes()->sync($attibutes);

        return redirect()->route('admin.catalog.products.index')
            ->with('success', "Товар \"{$request->title}\" успешно создан");

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('admin.catalog.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.catalog.products.index')
            ->with('success', "Товар \"{$product->title}\" успешно удален");
    }
}
