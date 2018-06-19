<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Department;
use App\Models\Role;
use App\User;

/**
 * App\Models\Staff
 *
 * @property int $id
 * @property int $user_id
 * @property int $department_id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Staff whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Staff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Staff whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Staff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Staff whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Staff extends BaseModel
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function faculty() {
        return $this->department()->faculty();
    }

    public function school() {
        return $this->faculty()->school();
    }

    public static function boot() {
        self::created(function ($model) {
            $staffRole = Role::where('name', Role::STAFF)->first();
            $model->user->roles()->syncWithoutDetaching($staffRole->id);
        });
    }
}
