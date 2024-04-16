<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Exceptions\CannotDeleteException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('brand')->with('product_category')->with('thumbnail')->get();

        return view('crm.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = ProductCategory::all();

        return view('crm.products.create', [
            'brands' => $brands,
            'categories' => app_get_tree($categories->toArray()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required',
            'consist' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'visible' => 'boolean',
            'priority' => 'numeric',
            'brand_id' => 'required|exists:App\Models\Brand,id',
            'product_category_id' => 'required|exists:App\Models\ProductCategory,id',
        ]);

        $product = Product::create($values);

        return to_route('products.show', [
            'product' => $product->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('crm.products.show', [
            'product' => $product,
            'thumbnail' => $product->thumbnail,
            'images' => $product->images,
            'brand' => $product->brand()->first(),
            'category' => $product->product_category()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('product_category', 'brand')->findOrFail($id);
        $brands = Brand::all();
        $categories = ProductCategory::all();

        return view('crm.products.edit', [
            'product' => $product,
            'brands' => $brands,
            'categories' => app_get_tree($categories->toArray()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $values = $request->validate([
            'name' => 'required',
            'consist' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'visible' => 'boolean',
            'priority' => 'numeric',
            'brand_id' => 'required|exists:App\Models\Brand,id',
            'product_category_id' => 'required|exists:App\Models\ProductCategory,id',
        ]);

        $product = Product::findOrFail($id)->update($values);

        return to_route('products.show', [
            'product' => $id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            Product::findOrFail($id)->delete();
        } catch(CannotDeleteException $e) {
            $request->session()->flash('alert-cannot-delete', true);
        }

        return redirect()->route('products.index');
    }
}
