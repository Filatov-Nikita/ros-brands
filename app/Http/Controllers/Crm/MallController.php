<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mall;
use Illuminate\Support\Facades\Storage;
use App\Models\Attachment;
use App\Models\DataTransferObjects\Attachments\CreateImageData;
use App\Models\Actions\Attachments\CreateImage;

class MallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $malls = Mall::all();

        return view('crm.malls.index', [
            'malls' => $malls
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crm.malls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'planeta_mall_code' => 'required|min:3',
            'site_href' => 'required|url',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $mall = Mall::create($values);

        return to_route('malls.show', [ 'mall' => $mall->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mall = Mall::findOrFail($id);

        return view('crm.malls.show', [
            'mall' => $mall,
            'logotype' => $mall->logotype,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mall = Mall::findOrFail($id);

        return view('crm.malls.edit', [
            'mall' => $mall,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $values = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'planeta_mall_code' => 'required|min:3',
            'site_href' => 'required|url',
            'visible' => 'boolean',
            'priority' => 'numeric',
        ]);

        $mall = Mall::findOrFail($id)->update($values);

        return to_route('malls.show', [ 'mall' => $id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mall::destroy($id);

        return redirect()->route('malls.index');
    }

    public function attach_logotype(Request $request, string $id, CreateImage $createImage) {
        $request->validate([
            'logotype_file' => 'required',
        ]);

        $file = $request->file('logotype_file');

        $mall = Mall::findOrFail($id);

        $data = new CreateImageData(
            image: $file,
            relatable: $mall,
            owner: $request->user(),
            disk: 'public',
            directory: 'malls',
            type: 'logotype'
        );

        $createImage($data);

        return to_route('malls.show', [ 'mall' => $id ]);
    }
}
