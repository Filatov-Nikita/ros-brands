<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Brand;
use App\Models\Actions\Attachments\CreateImage;
use App\Models\Actions\Attachments\DeleteImage;
use App\Models\DataTransferObjects\Attachments\CreateImageData;

class BrandImageController extends Controller
{
    public function store(Request $request, string $brand_id, CreateImage $createImage) {
        $request->validate([
            'logotype_file' => 'required|image|max:512',
        ]);

        $file = $request->file('logotype_file');

        $brand = Brand::findOrFail($brand_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $brand,
            owner: $request->user(),
            disk: 'public',
            directory: 'brands/logotypes',
            type: 'logotype'
        );

        $createImage($data);

        return to_route('brands.show', [ 'brand' => $brand_id ]);
    }

    public function update(
        Request $request,
        string $brand_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'logotype_file' => 'required|image|max:512',
        ]);

        $file = $request->file('logotype_file');

        $brand = Brand::findOrFail($brand_id);

        $image = $brand->logotype;

        if ($image) {
            $deleteImage($image);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $brand,
            owner: $request->user(),
            disk: 'public',
            directory: 'brands/logotypes',
            type: 'logotype'
        );

        $createImage($data);

        return to_route('brands.show', [ 'brand' => $brand_id ]);
    }
}
