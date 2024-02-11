<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Look;
use App\Models\Actions\Attachments\CreateImage;
use App\Models\Actions\Attachments\DeleteImage;
use App\Models\DataTransferObjects\Attachments\CreateImageData;

class LookImageController extends Controller
{
    public function store_thumb(Request $request, string $look_id, CreateImage $createImage) {
        $request->validate([
            'thumb_file' => 'required',
        ]);

        $file = $request->file('thumb_file');

        $look = Look::findOrFail($look_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $look,
            owner: $request->user(),
            disk: 'public',
            directory: 'looks/thumbs',
            type: 'thumbnail'
        );

        $createImage($data);

        return to_route('looks.show', [ 'look' => $look_id ]);
    }

    public function update_thumb(
        Request $request,
        string $look_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'thumb_file' => 'required',
        ]);

        $file = $request->file('thumb_file');

        $look = Look::findOrFail($look_id);

        $thumbnail = $look->thumbnail;

        if ($thumbnail) {
            $deleteImage($thumbnail);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $look,
            owner: $request->user(),
            disk: 'public',
            directory: 'looks/thumbs',
            type: 'thumbnail'
        );

        $createImage($data);

        return to_route('looks.show', [ 'look' => $look_id ]);
    }


    public function store_image(Request $request, string $look_id, CreateImage $createImage) {
        $request->validate([
            'image_file' => 'required',
        ]);

        $file = $request->file('image_file');

        $look = Look::findOrFail($look_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $look,
            owner: $request->user(),
            disk: 'public',
            directory: 'looks/images',
            type: 'image'
        );

        $createImage($data);

        return to_route('looks.show', [ 'look' => $look_id ]);
    }

    public function remove_image(
        Request $request,
        string $look_id,
        string $image_id,
        DeleteImage $deleteImage,
    ) {
        $look = Look::findOrFail($look_id);

        $image = $look->images()->find($image_id);

        if ($image) {
            $deleteImage($image);
        }

        return to_route('looks.show', [ 'look' => $look_id ]);
    }

    public function update_image(
        Request $request,
        string $look_id,
        string $image_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'image_file' => 'required',
        ]);

        $file = $request->file('image_file');

        $look = Look::findOrFail($look_id);

        $image = $look->images()->find($image_id);

        if ($image) {
            $deleteImage($image);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $look,
            owner: $request->user(),
            disk: 'public',
            directory: 'looks/images',
            type: 'image'
        );

        $createImage($data);

        return to_route('looks.show', [ 'look' => $look_id ]);
    }
}
