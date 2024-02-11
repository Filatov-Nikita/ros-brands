<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Look extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function designer(): BelongsTo
    {
        return $this->belongsTo(Designer::class);
    }

    public function look_category(): BelongsTo
    {
        return $this->belongsTo(LookCategory::class);
    }

    public function look_color(): BelongsTo
    {
        return $this->belongsTo(LookColor::class);
    }

    public function look_styles(): BelongsToMany
    {
        return $this->belongsToMany(LookStyle::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function thumbnail(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'domain')->where('type', 'thumbnail');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'domain')->where('type', 'image');
    }
}
