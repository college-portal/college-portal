<?php

namespace App\Traits;

use App\Models\Content;

trait ContentableTrait
{
    public function contents() {
        return $this->hasMany(Content::class, 'owner_id')->whereHas('type', function ($q) {
            return $q->where('type', static::class);
        });
    }
}
