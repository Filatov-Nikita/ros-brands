<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Mall;
use App\Models\Actions\Attachments\CreateImage;
use App\Models\Actions\Attachments\DeleteImage;
use App\Models\DataTransferObjects\Attachments\CreateImageData;

class MallImageController extends Controller
{
    public function store(Request $request, string $mall_id, CreateImage $createImage) {
        $request->validate([
            'logotype_file' => 'required|image|max:512',
        ]);

        $file = $request->file('logotype_file');

        $mall = Mall::findOrFail($mall_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $mall,
            owner: $request->user(),
            disk: 'public',
            directory: 'malls/logotypes',
            type: 'logotype'
        );

        $createImage($data);

        return to_route('malls.show', [ 'mall' => $mall_id ]);
    }

    public function update(
        Request $request,
        string $mall_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'logotype_file' => 'required|image|max:512',
        ]);

        $file = $request->file('logotype_file');

        $mall = Mall::findOrFail($mall_id);

        $image = $mall->logotype;

        if ($image) {
            $deleteImage($image);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $mall,
            owner: $request->user(),
            disk: 'public',
            directory: 'malls/logotypes',
            type: 'logotype'
        );

        $createImage($data);

        return to_route('malls.show', [ 'mall' => $mall_id ]);
    }
}
