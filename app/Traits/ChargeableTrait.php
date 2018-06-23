<?php

namespace App\Traits;

use App\Models\Chargeable;
use App\Models\ChargeableService;
use Illuminate\Database\Eloquent\Builder;

trait ChargeableTrait
{
    /**
     * Returns a query builder for App\Models\Chargeable
     *
     * @return Illuminate\Database\Eloquent\Builder|App\Models\Chargeable
     */
    public function scopeChargeables()
    {
        return Chargeable::where('type', static::class)->whereHas('service', function ($q) {
            return $q->where('id', $this->id);
        });
    }

    /**
     * Returns a query builder for App\Models\ChargeableService
     *
     * @return Illuminate\Database\Eloquent\Builder|App\Models\ChargeableService
     */
    public function scopeChargeableServices($query, $school_id)
    {
        return ChargeableService::where([
            'type' => static::class,
            'school_id' => $school_id
        ]);
    }
}