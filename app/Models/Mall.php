<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Mall extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class);
    }

    public function logotype(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'domain')->where('type', 'logotype');
    }
}
