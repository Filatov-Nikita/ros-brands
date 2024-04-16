<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designer;
use App\Exceptions\CannotDeleteException;

class DesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designers = Designer::with('image')->get();

        return view('crm.designers.index', [
            'designers' => $designers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.designers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required',
            'declinated_name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $designer = Designer::create($values);

        return to_route('designers.show', [ 'designer' => $designer->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $designer = Designer::findOrFail($id);

        return view('crm.designers.show', [
            'designer' => $designer,
            'image' => $designer->image,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $designer = Designer::findOrFail($id);

        return view('crm.designers.edit', [ 'designer' => $designer ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $values = $request->validate([
            'name' => 'required',
            'declinated_name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $designer = Designer::findOrFail($id)->update($values);

        return to_route('designers.show', [ 'designer' => $id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            Designer::findOrFail($id)->delete();
        } catch(CannotDeleteException $e) {
            $request->session()->flash('alert-cannot-delete', true);
        }

        return redirect()->route('designers.index');
    }
}
