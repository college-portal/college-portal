<?php

namespace App\Traits;

use App\Models\Image;

trait ImageableTrait
{
    public function images() {
        return $this->hasMany(Image::class, 'owner_id')->whereHas('type', function ($q) {
            return $q->where('type', self::class);
        });
    }
}
