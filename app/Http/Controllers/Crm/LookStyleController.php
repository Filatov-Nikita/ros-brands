<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LookStyle;

class LookStyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $styles = LookStyle::all();

        return view('crm.look-styles.index', [
            'styles' => $styles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.look-styles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $style = LookStyle::create($values);

        return to_route('look-styles.show', [ 'look_style' => $style->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $style = LookStyle::findOrFail($id);

        return view('crm.look-styles.show', [
            'look_style' => $style
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $style = LookStyle::findOrFail($id);

        return view('crm.look-styles.edit', [
            'look_style' => $style,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $values = $request->validate([
            'name' => 'required',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $style = LookStyle::findOrFail($id)->update($values);

        return to_route('look-styles.show', [ 'look_style' => $id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LookStyle::destroy($id);

        return redirect()->route('look-styles.index');
    }
}
