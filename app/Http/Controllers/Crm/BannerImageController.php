<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Actions\Attachments\CreateImage;
use App\Models\Actions\Attachments\DeleteImage;
use App\Models\DataTransferObjects\Attachments\CreateImageData;


class BannerImageController extends Controller
{
    public function store_image(Request $request, string $banner_id, CreateImage $createImage) {
        $request->validate([
            'image_file' => 'required',
        ]);

        $file = $request->file('image_file');

        $banner = Banner::findOrFail($banner_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $banner,
            owner: $request->user(),
            disk: 'public',
            directory: 'banners/images',
            type: 'image'
        );

        $createImage($data);

        return to_route('banners.show', [ 'banner' => $banner_id ]);
    }

    public function update_image(
        Request $request,
        string $banner_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'image_file' => 'required',
        ]);

        $file = $request->file('image_file');

        $banner = Banner::findOrFail($banner_id);

        $image = $banner->image;

        if ($image) {
            $deleteImage($image);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $banner,
            owner: $request->user(),
            disk: 'public',
            directory: 'banners/images',
            type: 'image'
        );

        $createImage($data);

        return to_route('banners.show', [ 'banner' => $banner_id ]);
    }


    public function store_image_mobile(Request $request, string $banner_id, CreateImage $createImage) {
        $request->validate([
            'image_mobile_file' => 'required',
        ]);

        $file = $request->file('image_mobile_file');

        $banner = Banner::findOrFail($banner_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $banner,
            owner: $request->user(),
            disk: 'public',
            directory: 'banners/image-mobiles',
            type: 'image-mobile'
        );

        $createImage($data);

        return to_route('banners.show', [ 'banner' => $banner_id ]);
    }

    public function update_image_mobile(
        Request $request,
        string $banner_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'image_mobile_file' => 'required',
        ]);

        $file = $request->file('image_mobile_file');

        $banner = Banner::findOrFail($banner_id);

        $image = $banner->image_mobile;

        if ($image) {
            $deleteImage($image);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $banner,
            owner: $request->user(),
            disk: 'public',
            directory: 'banners/image-mobiles',
            type: 'image-mobile'
        );

        $createImage($data);

        return to_route('banners.show', [ 'banner' => $banner_id ]);
    }
}
