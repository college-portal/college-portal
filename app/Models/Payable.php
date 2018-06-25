<?php

namespace App\Models;

use App\Models\User;
use App\Models\Chargeable;
use App\Models\BaseModel;

/**
 * App\Models\Payable
 * 
 * A payable represents the fact that a user has to pay for a chargeable. 
 * - It should be hook for all Models that implement App\Traits\ChargeableTrait
 * - The hook should be executed before POSTs in the service, to check that no pending payable exists
 * - The POST operation should fail if such a payable exists
 *
 * @property int $id
 * @property int $user_id
 * @property int $chargeable_id
 * @property boolean $is_paid
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Payable extends BaseModel
{
    protected $fillable = [ 'user_id', 'chargeable_id' ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function chargeable() {
        return $this->belongsTo(Chargeable::class);
    }
}
