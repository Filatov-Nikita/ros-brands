<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Exceptions\CannotDeleteException;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    protected static function booted(): void
    {
        static::deleting(function(ProductCategory $category) {

            $ids = get_cat_children_ids(
                        ProductCategory::all()->toArray(),
                        $category->id,
                    );

            if(Product::whereIn('product_category_id', $ids)->count() > 0) {
                throw new CannotDeleteException();
            }
        });
    }
}
