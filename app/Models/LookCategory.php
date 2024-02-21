<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Exceptions\CannotDeleteException;

class LookCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function looks(): HasMany
    {
        return $this->hasMany(Look::class);
    }

    protected static function booted(): void
    {
        static::deleting(function(LookCategory $lookCategory) {
            if($lookCategory->looks()->count() > 0) {
                throw new CannotDeleteException();
            }
        });
    }
}
