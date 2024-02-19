<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Look;
use App\Http\Resources\Api\ProductListResource;
use App\Http\Resources\Api\LookListResource;

class FavoriteController extends Controller
{
    public function resolve_product_ids(Request $request) {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'numeric',
        ]);

        $products = Product::with(['brand', 'thumbnail'])->whereIn('id', $request->input('ids'))->get();

        return ProductListResource::collection($products);
    }

    public function resolve_look_ids(Request $request) {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'numeric',
        ]);

        $looks = Look::with(['thumbnail'])->whereIn('id', $request->input('ids'))->get();

        return LookListResource::collection($looks);
    }
}
