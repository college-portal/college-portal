<?php

namespace App\Models;

use App\Models\BaseModel;
use App\User;
use App\Models\School;

/**
 * App\Models\School
 *
 * @property int $id
 * @property int $school_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SchoolHasUser extends BaseModel
{

    protected $fillable = [ 'school_id', 'user_id' ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
