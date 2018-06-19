<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Faculty;
use App\Models\Staff;
use App\Models\Program;
use App\User;

/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $name
 * @property int $hod_id
 * @property int $faculty_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Department extends BaseModel
{
    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }

    public function hod() {
        return $this->belongsTo(Staff::class, 'hod_id');
    }

    public function programs() {
        return $this->hasMany(Program::class);
    }

    public function staff() {
        return $this->hasMany(Staff::class);
    }

    public static function boot() {
        $schoolHasUsersUpdate = function ($model) {
            $staff = Staff::with('user')->find($model->hod_id);
            if ($staff->user) {
                $faculty = $model->faculty;
                if ($faculty) {
                    $school = $faculty->school()->first();
                    if ($school) {
                        $school->users()->syncWithoutDetaching($staff->user->id);
                    }
                }
            }
        };

        self::created($schoolHasUsersUpdate);
        self::updated($schoolHasUsersUpdate);
    }
}
