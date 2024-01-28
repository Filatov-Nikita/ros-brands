<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mall extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class);
    }
}
