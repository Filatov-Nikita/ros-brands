<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'brand' => [
                'id' => $this->brand->id,
                'name' => $this->brand->name,
            ],
            'images' => ImageResource::collection($this->images),
            'thumbnail' => new ImageResource($this->thumbnail),
        ];
    }
}
