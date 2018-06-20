<?php

namespace App\Models;

use App\Models\BaseModel;
use App\User;
use App\Models\Role;
use App\Models\Faculty;
use App\Models\SchoolHasUser;

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

    protected $fillable = [ 'name', 'short_name', 'is_active' ];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, SchoolHasUser::name());
    }

    public function faculties() {
        return $this->hasMany(Faculty::class);
    }

    public static function boot() {
        $schoolHasUsersUpdate = function ($model) {
            /** update school_has_users table */
            $model->users()->syncWithoutDetaching($model->owner_id);
        };

        $schoolOwnerRoleCreate = function ($model) {
            /** create school-owner user role */
            if ($model->owner_id) {
                $schoolOwnerRole = Role::where('name', Role::SCHOOL_OWNER)->first();
                $model->owner->roles()->syncWithoutDetaching($schoolOwnerRole->id);
            }
        };

        self::created($schoolHasUsersUpdate);
        self::updated($schoolHasUsersUpdate);

        self::created($schoolOwnerRoleCreate);
        self::updated($schoolOwnerRoleCreate);
    }
}
