<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'title' => $this->title,
            'href' => $this->href,
            'priority' => $this->priority,
            'image' => new ImageResource($this->image),
            'image_mobile' => new ImageResource($this->image_mobile),
        ];
    }
}
