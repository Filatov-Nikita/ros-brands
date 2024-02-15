<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function image(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'domain')->where('type', 'image');
    }

    public function image_mobile(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'domain')->where('type', 'image-mobile');
    }
}
