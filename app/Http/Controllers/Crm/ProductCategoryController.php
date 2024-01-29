<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = ProductCategory::all();

        return view('crm.product-categories.index', [
            'categories' => app_get_tree($cats->toArray()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = ProductCategory::all();

        return view('crm.product-categories.create', [
            'categories' => app_get_tree($cats->toArray()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cat_parent' => 'numeric|nullable',
        ]);

        $cat = ProductCategory::create([
            'name' => $request->input('name'),
            'parent_id' => $request->input('cat_parent')
        ]);

        return to_route('product-categories.show', [
            'product_category' => $cat->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cat = ProductCategory::findOrFail($id);

        return view('crm.product-categories.show', [
            'category' => $cat,
            'parent' => $cat->parent()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = ProductCategory::findOrFail($id);
        $cats = ProductCategory::all();

        return view('crm.product-categories.edit', [
            'categories' => app_get_tree($cats->toArray()),
            'product_category' => $cat,
            'parent' => $cat->parent()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'cat_parent' => 'numeric|nullable',
        ]);

        $cat = ProductCategory::findOrFail($id)->update([
            'name' => $request->input('name'),
            'parent_id' => $request->input('cat_parent')
        ]);

        return to_route('product-categories.show', [
            'product_category' => $id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductCategory::destroy($id);

        return redirect()->route('product-categories.index');
    }
}
