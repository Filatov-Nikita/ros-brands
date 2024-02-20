<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Designer;
use App\Models\Actions\Attachments\CreateImage;
use App\Models\Actions\Attachments\DeleteImage;
use App\Models\DataTransferObjects\Attachments\CreateImageData;

class DesignerImageController extends Controller
{
    public function store(Request $request, string $designer_id, CreateImage $createImage) {
        $request->validate([
            'image_file' => 'required|image|max:1024',
        ]);

        $file = $request->file('image_file');

        $designer = Designer::findOrFail($designer_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $designer,
            owner: $request->user(),
            disk: 'public',
            directory: 'designers/images',
            type: 'image'
        );

        $createImage($data);

        return to_route('designers.show', [ 'designer' => $designer_id ]);
    }

    public function update(
        Request $request,
        string $designer_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'image_file' => 'required|image|max:1024',
        ]);

        $file = $request->file('image_file');

        $designer = Designer::findOrFail($designer_id);

        $image = $designer->image;

        if ($image) {
            $deleteImage($image);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $designer,
            owner: $request->user(),
            disk: 'public',
            directory: 'designers/images',
            type: 'image'
        );

        $createImage($data);

        return to_route('designers.show', [ 'designer' => $designer_id ]);
    }
}
