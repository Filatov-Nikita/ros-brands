<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;
use App\Models\Actions\Attachments\CreateImage;
use App\Models\Actions\Attachments\DeleteImage;
use App\Models\DataTransferObjects\Attachments\CreateImageData;

class ProductImageController extends Controller
{
    public function store_thumb(Request $request, string $product_id, CreateImage $createImage) {
        $request->validate([
            'thumb_file' => 'required',
        ]);

        $file = $request->file('thumb_file');

        $product = Product::findOrFail($product_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $product,
            owner: $request->user(),
            disk: 'public',
            directory: 'products/thumbs',
            type: 'thumbnail'
        );

        $createImage($data);

        return to_route('products.show', [ 'product' => $product_id ]);
    }

    public function update_thumb(
        Request $request,
        string $product_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'thumb_file' => 'required',
        ]);

        $file = $request->file('thumb_file');

        $product = Product::findOrFail($product_id);

        $thumbnail = $product->thumbnail;

        if ($thumbnail) {
            $deleteImage($thumbnail);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $product,
            owner: $request->user(),
            disk: 'public',
            directory: 'products/thumbs',
            type: 'thumbnail'
        );

        $createImage($data);

        return to_route('products.show', [ 'product' => $product_id ]);
    }


    public function store_image(Request $request, string $product_id, CreateImage $createImage) {
        $request->validate([
            'image_file' => 'required',
        ]);

        $file = $request->file('image_file');

        $product = Product::findOrFail($product_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $product,
            owner: $request->user(),
            disk: 'public',
            directory: 'products/images',
            type: 'image'
        );

        $createImage($data);

        return to_route('products.show', [ 'product' => $product_id ]);
    }

    public function remove_image(
        Request $request,
        string $product_id,
        string $image_id,
        DeleteImage $deleteImage,
    ) {
        $product = Product::findOrFail($product_id);

        $image = $product->images()->find($image_id);

        if ($image) {
            $deleteImage($image);
        }

        return to_route('products.show', [ 'product' => $product_id ]);
    }

    public function update_image(
        Request $request,
        string $product_id,
        string $image_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'image_file' => 'required',
        ]);

        $file = $request->file('image_file');

        $product = Product::findOrFail($product_id);

        $image = $product->images()->find($image_id);

        if ($image) {
            $deleteImage($image);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $product,
            owner: $request->user(),
            disk: 'public',
            directory: 'products/images',
            type: 'image'
        );

        $createImage($data);

        return to_route('products.show', [ 'product' => $product_id ]);
    }
}
