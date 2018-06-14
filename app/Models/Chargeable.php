<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\ChargeableService;

/**
 * App\Models\Chargeable
 *
 * @property int $id
 * @property int $chargeable_service_id
 * @property string $chargeable_id
 * @property string $chargeable_type
 * @property float $amount
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chargeable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chargeable whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chargeable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Chargeable whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chargeable extends BaseModel
{
    public function service() {
        return $this->belongsTo(ChargeableService::class);
    }
}
