<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function malls(): BelongsToMany
    {
        return $this->belongsToMany(Mall::class);
    }
}
