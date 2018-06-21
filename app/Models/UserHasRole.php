<?php

namespace App\Models;

use App\Models\BaseModel;
use App\User;
use App\Models\Role;

/**
 * App\Models\UserHasRole
 *
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property int $school_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserHasRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserHasRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserHasRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserHasRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserHasRole extends BaseModel
{
    protected $table = 'user_has_roles';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }
}
