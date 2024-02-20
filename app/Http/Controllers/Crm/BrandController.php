<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Mall;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use App\Models\Attachment;
use App\Models\Promotion;
use App\Models\DataTransferObjects\Attachments\CreateImageData;
use App\Models\Actions\Attachments\CreateImage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('name', 'asc')->get();

        return view('crm.brands.index', [
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $malls = Mall::all();
        return view('crm.brands.create', [
            'malls' => $malls,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required',
            'planeta_mall_id' => 'required|numeric',
            'visible' => 'boolean',
            'malls.*' => 'numeric',
        ]);

        $brand = Brand::create(
            Arr::only($values, ['name', 'planeta_mall_id', 'visible'])
        );

        if($request->input('malls') !== null) {
            $brand->malls()->attach($request->input('malls'));
        }

        return to_route('brands.show', [ 'brand' => $brand->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        $promotions = Promotion::all();

        return view('crm.brands.show', [
            'brand' => $brand,
            'malls' => $brand->malls()->get(),
            'logotype' => $brand->logotype,
            'promotions' => $promotions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        $malls = Mall::all();

        return view('crm.brands.edit', [
            'brand' => $brand,
            'malls' => $malls,
            'binded_malls' => $brand->malls()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $values = $request->validate([
            'name' => 'required',
            'planeta_mall_id' => 'required|numeric',
            'visible' => 'boolean',
            'malls.*' => 'numeric',
        ]);

        $brand = Brand::findOrFail($id)->fill(
            Arr::only($values, ['name', 'planeta_mall_id', 'visible'])
        );

        $brand->save();

        if($request->input('malls') !== null) {
            $brand->malls()->sync($request->input('malls'));
        }

        return to_route('brands.show', [ 'brand' => $id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::destroy($id);

        return redirect()->route('brands.index');
    }

    public function attach_promotions(Request $request, string $id)
    {
        $request->validate([
            'promotion_ids.*' => 'exists:App\Models\Promotion,id',
        ]);

        $brand = Brand::findOrFail($id);

        $brand->promotions()->sync($request->input('promotion_ids'));

        return to_route('brands.show', [ 'brand' => $id ]);
    }
}
