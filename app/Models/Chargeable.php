<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Semester;
use App\Models\Session;
use App\Models\ChargeableService;
use App\Models\Payable;

/**
 * App\Models\Chargeable
 *
 * @property int $id
 * @property int $chargeable_service_id
 * @property string $owner_id
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
    public const SEMESTER = Semester::class;
    public const SESSION = Session::class;

    public const ITEMS = [ self::SEMESTER, self::SESSION ];

    protected $fillable = [ 'chargeable_service_id', 'owner_id', 'amount' ];

    public function service() {
        return $this->belongsTo(ChargeableService::class, 'chargeable_service_id');
    }

    public function scopeOwner() {
        return app($this->service()->first()->type)->where('id', $this->owner_id);
    }

    public function payables() {
        return $this->hasMany(Payable::class);
    }
}
