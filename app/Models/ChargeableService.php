<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Chargeable;

/**
 * App\Models\ChargeableService
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property float $amount
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ChargeableService extends BaseModel
{
    public function chargeables() {
        return $this->hasMany(Chargeable::class);
    }
}
