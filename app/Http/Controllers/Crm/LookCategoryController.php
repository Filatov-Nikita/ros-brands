<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LookCategory;
use App\Exceptions\CannotDeleteException;

class LookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = LookCategory::all();

        return view('crm.look-categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.look-categories.create');
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

        $category = LookCategory::create($values);

        return to_route('look-categories.show', [ 'look_category' => $category->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = LookCategory::findOrFail($id);

        return view('crm.look-categories.show', [ 'look_category' => $category ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = LookCategory::findOrFail($id);

        return view('crm.look-categories.edit', [
            'look_category' => $category,
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

        $category = LookCategory::findOrFail($id)->update($values);

        return to_route('look-categories.show', [ 'look_category' => $id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            LookCategory::findOrFail($id)->delete();
        } catch(CannotDeleteException $e) {
            $request->session()->flash('alert-cannot-delete', true);
        }

        return redirect()->route('look-categories.index');
    }
}
