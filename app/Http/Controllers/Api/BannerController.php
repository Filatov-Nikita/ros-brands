<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Resources\Api\BannerResource;

class BannerController extends Controller
{
    public function index() {
        $banners = Banner::with(['image', 'image_mobile'])
            ->orderBy('priority', 'desc')
            ->where('visible', 1)
            ->get();

        return BannerResource::collection($banners);
    }
}
