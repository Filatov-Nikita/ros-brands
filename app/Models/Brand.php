<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use App\Exceptions\CannotDeleteException;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function malls(): BelongsToMany
    {
        return $this->belongsToMany(Mall::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function logotype(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'domain')->where('type', 'logotype');
    }

    public function promotions(): BelongsToMany
    {
        return $this->belongsToMany(Promotion::class);
    }

    protected static function booted(): void
    {
        static::deleting(function(Brand $brand) {
            if($brand->products()->count() > 0) {
                throw new CannotDeleteException();
            }

            if($brand->promotions()->count() > 0) {
                throw new CannotDeleteException();
            }
        });
    }
}
