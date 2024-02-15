<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LookColor;
use App\Http\Resources\Api\LookColorResource;

class LookColorController extends Controller
{
    public function index() {
        $colors = LookColor::orderBy('priority', 'desc')
            ->where('visible', 1)
            ->get();

        return LookColorResource::collection($colors);
    }
}
