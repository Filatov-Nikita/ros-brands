<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
        return $this->hasMany(Products::class);
    }

    public function logotype(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'domain')->where('type', 'logotype');
    }
}
