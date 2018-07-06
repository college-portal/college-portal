<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\School;
use App\Models\Chargeable;

/**
 * App\Models\ChargeableService
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $description
 * @property float $amount
 * @property int school_id
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
    protected $fillable = [ 'type', 'name', 'description', 'amount', 'school_id' ];

    public function chargeables() {
        return $this->hasMany(Chargeable::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }
}
