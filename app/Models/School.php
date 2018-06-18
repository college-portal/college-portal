<?php

namespace App\Models;

use App\Models\BaseModel;
use App\User;
use App\Traits\FilterableTrait;

/**
 * App\Models\School
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property int $owner_id
 * @property boolean $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class School extends BaseModel
{
    use FilterableTrait;

    protected $fillable = [ 'name', 'short_name', 'is_active' ];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
