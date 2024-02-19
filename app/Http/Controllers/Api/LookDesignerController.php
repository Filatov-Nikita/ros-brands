<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designer;
use App\Models\Look;
use App\Http\Resources\Api\LookListResource;

class LookDesignerController extends Controller
{
    public function looks_with_designer(Request $request,  string $id) {
        $designer = Designer::findOrFail($id);

        $looks = $designer->looks()->with(['thumbnail'])->paginate(4);

        return LookListResource::collection($looks);
    }
}
