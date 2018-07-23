<?php

namespace App\Traits;

use App\Models\Asset;

trait AssetableTrait
{
    public function assets() {
        return $this->hasMany(Asset::class, 'owner_id')->whereHas('type', function ($q) {
            return $q->where('type', self::class);
        });
    }
}
