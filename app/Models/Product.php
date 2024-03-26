<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Exceptions\CannotDeleteException;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product_category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function looks(): BelongsToMany
    {
        return $this->belongsToMany(Look::class);
    }

    public function thumbnail(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'domain')->where('type', 'thumbnail');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'domain')->where('type', 'image');
    }

    protected static function booted(): void
    {
        static::deleting(function(Product $product) {
            if($product->looks()->count() > 0) {
                throw new CannotDeleteException();
            }
        });
    }
}
