<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();

        return view('crm.banners.index', [
            'banners' => $banners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            'title' => 'nullable',
            'href' => 'nullable|url',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $banner = Banner::create($values);

        return to_route('banners.show', [ 'banner' => $banner->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::findOrFail($id);

        return view('crm.banners.show', [
            'banner' => $banner,
            'image' => $banner->image,
            'image_mobile' => $banner->image_mobile,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);

        return view('crm.banners.edit', [ 'banner' => $banner ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $values = $request->validate([
            'title' => 'nullable',
            'href' => 'nullable|url',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $banner = Banner::findOrFail($id)->update($values);

        return to_route('banners.show', [ 'banner' => $id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Banner::destroy($id);

        return redirect()->route('banners.index');
    }
}
