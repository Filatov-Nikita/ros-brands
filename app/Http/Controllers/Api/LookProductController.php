<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Look;
use App\Http\Resources\Api\LookListResource;

class LookProductController extends Controller
{
    public function looks_with_product(Request $request,  string $id) {
        $product = Product::findOrFail($id);

        $looks = $product->looks()->with(['thumbnail'])->paginate(4);

        return LookListResource::collection($looks);
    }
}
