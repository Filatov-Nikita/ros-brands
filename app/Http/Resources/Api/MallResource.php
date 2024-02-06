<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\ImageResource;

class MallResource extends JsonResource
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
            'city' => $this->city,
            'priority' => $this->priority,
            'site_href' => $this->site_href,
            'planeta_mall_code' => $this->planeta_mall_code,
            'logotype' => new ImageResource($this->logotype),
        ];
    }
}
