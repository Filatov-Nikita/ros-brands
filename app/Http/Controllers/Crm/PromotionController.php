<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();

        return view('crm.promotions.index', [
            'promotions' => $promotions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'visible' => 'boolean',
        ]);

        $promotion = Promotion::create($values);

        return to_route('promotions.show', [ 'promotion' => $promotion->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = Promotion::findOrFail($id);

        return view('crm.promotions.show', [
            'promotion' => $promotion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotion = Promotion::findOrFail($id);

        return view('crm.promotions.edit', [
            'promotion' => $promotion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $values = $request->validate([
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'visible' => 'boolean',
        ]);

        $promotion = Promotion::findOrFail($id)->update($values);

        return to_route('promotions.show', [ 'promotion' => $id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Promotion::destroy($id);

        return redirect()->route('promotions.index');
    }
}
