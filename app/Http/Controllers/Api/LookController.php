<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Look;
use App\Http\Resources\Api\LookDetailedResource;
use App\Http\Resources\Api\LookListResource;
use Illuminate\Database\Eloquent\Builder;

class LookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Look::query();

        if($request->filled('look_category_id')) {
            $query->where('look_category_id', $request->input('look_category_id'));
        }

        if($request->filled('designer_ids')) {
            $query->whereIn('designer_id', $request->input('designer_ids'));
        }

        if($request->filled('color_ids')) {
            $query->whereIn('look_color_id', $request->input('color_ids'));
        }

        if($request->filled('style_ids')) {
            $query->whereHas('look_styles', function (Builder $lookStyleQuery) use($request) {
                $lookStyleQuery->whereIn('look_styles.id', $request->input('style_ids'));
            });
        }

        if($request->filled('brand_ids')) {
            $query->whereHas('products', function (Builder $productQuery) use($request) {
                $productQuery->whereIn('brand_id', $request->input('brand_ids'));
            });
        }

        if($request->filled('mall_id')) {
            $query->whereHas('products', function (Builder $productQuery) use($request) {
                $productQuery->whereHas('brand', function (Builder $brandQuery) use($request) {
                    $brandQuery->whereHas('malls', function (Builder $mallQuery) use($request) {
                        $mallQuery->where('malls.id', $request->input('mall_id'));
                    });
                });
            });
        }

        $query
            ->with(['thumbnail'])
            ->where('visible', 1)
            ->orderBy('priority', 'desc');

        return LookListResource::collection($query->paginate(16));
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
        $look = Look::findOrFail($id);

        return new LookDetailedResource($look);
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

    public function looks_similar(string $id)
    {
        $look = Look::findOrFail($id);

        $looks = Look::whereRelation('look_color', 'id', $look->look_color_id)
            ->whereRelation('look_category', 'id', $look->look_category_id)
            ->where('id', '!=', $look->id);

        return LookListResource::collection($looks->limit(4)->get());
    }
}
