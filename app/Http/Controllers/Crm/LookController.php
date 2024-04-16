<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designer;
use App\Models\LookCategory;
use App\Models\LookColor;
use App\Models\LookStyle;
use App\Models\Look;
use App\Models\Product;
use Illuminate\Support\Arr;

class LookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $looks = Look::with(['thumbnail', 'look_category', 'designer', 'look_styles'])->get();

        return view('crm.looks.index', [
            'looks' => $looks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designers = Designer::all();
        $categories = LookCategory::all();
        $colors = LookColor::all();
        $styles = LookStyle::all();

        return view('crm.looks.create', [
            'designers' => $designers,
            'categories' => $categories,
            'colors' => $colors,
            'styles' => $styles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'visible' => 'boolean',
            'priority' => 'numeric',
            'look_color_id' => 'required|exists:App\Models\LookColor,id',
            'look_category_id' => 'required|exists:App\Models\LookCategory,id',
            'designer_id' => 'nullable|exists:App\Models\Designer,id',
            'look_style_ids' => 'required',
            'look_style_ids.*' => 'exists:App\Models\LookStyle,id',
        ]);

        $look = Look::create(
            Arr::except($values, ['look_style_ids']),
        );

        $look->look_styles()->attach($request->input('look_style_ids'));

        return to_route('looks.show', [ 'look' => $look->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $look = Look::with(
            ['look_color', 'look_category', 'look_styles', 'products']
        )->findOrFail($id);

        $products = Product::all();

        $images = $look->images;
        $video = $look->video;

        $can_upload_assets = count($images) + ($video ? 1 : 0) < 4;

        return view('crm.looks.show', [
            'look' => $look,
            'products' => $products,
            'thumbnail' => $look->thumbnail,
            'images' => $images,
            'video' => $video,
            'can_upload_assets' => $can_upload_assets,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $look = Look::with([
            'designer',
            'look_category',
            'look_color',
            'look_styles',
        ])->findOrFail($id);

        $designers = Designer::all();
        $categories = LookCategory::all();
        $colors = LookColor::all();
        $styles = LookStyle::all();

        return view('crm.looks.edit', [
            'look' => $look,
            'designers' => $designers,
            'categories' => $categories,
            'colors' => $colors,
            'styles' => $styles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $values = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'visible' => 'boolean',
            'priority' => 'numeric',
            'look_color_id' => 'required|exists:App\Models\LookColor,id',
            'look_category_id' => 'required|exists:App\Models\LookCategory,id',
            'designer_id' => 'nullable|exists:App\Models\Designer,id',
            'look_style_ids' => 'required',
            'look_style_ids.*' => 'required|exists:App\Models\LookStyle,id',
        ]);

        $look = Look::findOrFail($id)
            ->fill(Arr::except($values, ['look_style_ids']));

        $look->save();
        $look->look_styles()->sync($request->input('look_style_ids'));

        return to_route('looks.show', [ 'look' => $id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Look::destroy($id);

        return redirect()->route('looks.index');
    }

    public function attach_products(Request $request, string $id)
    {
        $request->validate([
            'look_product_ids.*' => 'exists:App\Models\Product,id',
        ]);

        $look = Look::findOrFail($id);

        $look->products()->sync($request->input('look_product_ids'));

        return to_route('looks.show', [ 'look' => $id ]);
    }
}
