<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::defaultOrder()
            ->get()
            ->toTree();

        return view('admin.catalog.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $category = $request->category
            ? Category::whereSlug($request->category)->first()
            : null;

        $categories = Category::pluck('title', 'id')->all();

        return view(
            'admin.catalog.categories.create',
            compact('categories', 'category')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = [
            ...$request->validated(),
            'thumbnail' => Category::uploadImage($request),
        ];

        DB::transaction(function () use ($request, $data) {
            $category = Category::create($data);

            if ($request->parent_id) {
                $parentNode = Category::find($request->parent_id);
                $parentNode->appendNode($category);
            }
        });

        return redirect()->route('admin.catalog.categories.index')
            ->with('success', "Категория \"{$request->title}\" успешно создана");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        $categories = Category::pluck('title', 'id')->all();

        return view(
            'admin.catalog.categories.edit',
             compact('categories', 'category')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($file = Category::uploadImage($request, $category->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        // dd($request->all());
        DB::transaction(function () use ($request, $category) {
            // dd($category->parent_id, $request->parent_id);
            if (!$request->parent_id) {
                $category->saveAsRoot();
            }

            if ($request->shiftUp) {
                $category->up();
            }

            if ($request->shiftDown) {
                $category->down();
            }

            if ($request->parent_id
                && (int) $request->parent_id !== $category->parent_id
            ) {
                $parentNode = Category::findOrFail($request->parent_id);
                $parentNode->appendNode($category);
            }
        });

        $category->update($data);

        return redirect()->route('admin.catalog.categories.index')
            ->with('success', "Категория \"{$request->title}\" успешно обновлена");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->thumbnail) {
            Storage::delete($category->thumbnail);
        }

        $category->delete();

        return redirect()->route('admin.catalog.categories.index')
            ->with('success', "Категория \"{$category->title}\" успешно удалена");
    }
}
