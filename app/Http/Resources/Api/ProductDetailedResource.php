<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ProductCategory;

class ProductDetailedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    protected $cats = null;

    protected function get_cats() {

        if($this->cats === null) {
            $convert_cat = function ($cat) {
                return [
                    'id' => $cat['id'],
                    'name' => $cat['name'],
                    'parent_id' => $cat['parent_id'],
                ];
            };

            $this->cats = array_map(
                $convert_cat,
                ProductCategory::all()->toArray(),
            );
        }

        return $this->cats;
    }

    public function toArray(Request $request): array
    {
        $cats = $this->get_cats();
        $parents = array_reverse(
            get_flat_parents($cats, $this->product_category_id),
        );

        return [
            'id' => $this->id,
            'name' => $this->name,
            'consist' => $this->consist,
            'price' => $this->price,
            'description' => $this->description,
            'product_categories' => $parents,
            'brand' => new ProductBrandResource($this->brand),
            'images' => ImageResource::collection($this->images),
            'updated_at' => $this->updated_at,
        ];
    }
}
