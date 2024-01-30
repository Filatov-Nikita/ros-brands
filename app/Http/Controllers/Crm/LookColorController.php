<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LookColor;

class LookColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = LookColor::all();

        return view('crm.look-colors.index', [ 'colors' => $colors ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.look-colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required',
            'color_in_hex' => 'required|hex_color',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $color = LookColor::create($values);

        return to_route('look-colors.show', [ 'look_color' => $color->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $color = LookColor::findOrFail($id);

        return view('crm.look-colors.show', [ 'color' => $color ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = LookColor::findOrFail($id);

        return view('crm.look-colors.edit', [
            'color' => $color,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $values = $request->validate([
            'name' => 'required',
            'color_in_hex' => 'required|hex_color',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $color = LookColor::findOrFail($id)->update($values);

        return to_route('look-colors.show', [ 'look_color' => $id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LookColor::destroy($id);

        return redirect()->route('look-colors.index');
    }
}
