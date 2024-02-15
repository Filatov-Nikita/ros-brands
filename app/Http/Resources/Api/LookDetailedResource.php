<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LookDetailedResource extends JsonResource
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
            'description' => $this->description,
            'styles' => LookStyleResource::collection($this->look_styles),
            'images' => ImageResource::collection($this->images),
            'video_url' => new ImageResource($this->video),
            'designer' => new DesignerListResource($this->designer),
            'products' => ProductListResource::collection($this->products),
        ];
    }
}
