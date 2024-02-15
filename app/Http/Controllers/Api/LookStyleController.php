<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LookStyle;
use App\Http\Resources\Api\LookStyleResource;

class LookStyleController extends Controller
{
    public function index() {
        $styles = LookStyle::orderBy('priority', 'desc')
            ->where('visible', 1)
            ->get();

        return LookStyleResource::collection($styles);
    }
}
