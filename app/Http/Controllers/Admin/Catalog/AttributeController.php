<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $attributes = Attribute::paginate(20);

        return view('admin.catalog.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.catalog.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
        ]);

        Attribute::create($request->all());

        return redirect()
            ->route('admin.catalog.attributes.index')
            ->with('success', "Аттрибут \"{$request->title}\" успешно создан");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute): View
    {
        return view('admin.catalog.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Attribute $attribute): RedirectResponse {

        $request->validate([
            'title' => 'required',
        ]);

        $attribute->update($request->all());

        return redirect()
            ->route('admin.catalog.attributes.index')
            ->with('success', "Аттрибут \"{$attribute->title}\" успешно отредактирован");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute): RedirectResponse
    {
        $attribute->delete();

        return redirect()
            ->route('admin.catalog.attributes.index')
            ->with('success', "Аттрибут \"{$attribute->title}\" успешно удален");
    }
}
