<?php

namespace App\Models;

use App\Models\BaseModel;
use App\User;
use App\Models\Role;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\UserHasRole;
use App\Models\SemesterType;
use App\Models\Level;

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

    protected $fillable = [ 'name', 'short_name', 'is_active', 'owner_id' ];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, UserHasRole::name())->withTimestamps();
    }

    public function faculties() {
        return $this->hasMany(Faculty::class);
    }

    public function scopeDepartments() {
        $ids = $this->faculties()->pluck('id');
        return Department::whereIn('faculty_id', $ids);
    }

    public function semesterTypes() {
        return $this->hasMany(SemesterType::class);
    }

    public function levels() {
        return $this->hasMany(Level::class);
    }

    public static function boot() {
        $schoolOwnerRoleCreate = function ($model) {
            /** create school-owner user role */
            if ($model->owner_id) {
                $role = Role::where('name', Role::SCHOOL_OWNER)->first();
                $model->owner->roles()->syncWithoutDetaching([
                    $role->id => [
                        'school_id' => $model->id
                    ]
                ]);
            }
        };

        self::created($schoolOwnerRoleCreate);
        self::updated($schoolOwnerRoleCreate);
    }
}
