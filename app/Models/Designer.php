<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Designer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function looks(): HasMany
    {
        return $this->hasMany(Look::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'domain')->where('type', 'image');
    }
}
