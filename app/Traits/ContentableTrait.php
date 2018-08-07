<?php

namespace App\Traits;

use App\Models\Content;

trait ContentableTrait
{
    public function contents() {
        return $this->hasMany(Content::class, 'owner_id')->whereHas('type', function ($q) {
            return $q->where('type', static::class)->whereNull('related_to');
        });
    }

    public static function boot() {
        static::deleting(function ($model) {
            $model->contents()->get()->map(function ($content) {
                $content->delete();
            });
        });
    }
}
