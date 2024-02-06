<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if($request->filled('brand_id')) {
            $query->where('brand_id', $request->input('brand_id'));
        }

        if($request->filled('product_category_id')) {
            $cats = ProductCategory::all();
            $ids = get_all_parent_cat_ids($cats->toArray(), intval($request->input('product_category_id')));
            $query->whereIn('product_category_id', $ids);
        }

        if($request->filled('order_price_asc')) {
            $query->orderBy('price', 'asc');
        } elseif($request->filled('order_price_desc')) {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('priority', 'desc');
        }

        if($request->filled('mall_id')) {
            $query->whereHas('brand', function (Builder $brandQuery) use($request) {
                $brandQuery->whereHas('malls', function (Builder $mallQuery) use($request) {
                    $mallQuery->where('malls.id', $request->input('mall_id'));
                });
            });
        }

        $query->where('visible', 1);

        $query->with('brand');

        $result = $query->paginate(16);

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('brand')->findOrFail($id);

        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
