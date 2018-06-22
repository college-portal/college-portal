<?php

namespace App\Traits;

use App\Models\Chargeable;
use App\Models\ChargeableService;
use Illuminate\Database\Eloquent\Builder;

trait ChargeableTrait
{
    public function scopeChargeables()
    {
        return Chargeable::where('type', static::class)->whereHas('service', function ($q) {
            return $q->where('id', $this->id);
        });
    }

    public function scopeChargeableServices($query, $school_id)
    {
        return ChargeableService::where([
            'type' => static::class,
            'school_id' => $school_id
        ]);
    }
}