<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Role;
use App\Models\Department;
use App\Models\StudentTakesCourse;
use App\Models\Course;
use App\User;

/**
 * App\Models\Student
 *
 * @property int $id
 * @property int $user_id
 * @property int $program_id
 * @property string $matric_no
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Student extends BaseModel
{
    protected $fillable = [ 'user_id', 'program_id', 'matric_no', 'is_active' ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function courses() {
        return $this->hasManyThrough(Course::class, StudentTakesCourse::class, 'id', 'course_id');
    }

    public function scopeDepartment() {
        $ids = $this->program()->pluck('department_id');
        return Department::where('id', $ids);
    }

    public function scopeFaculty() {
        $ids = $this->department()->pluck('faculty_id');
        return Faculty::where('id', $ids);
    }

    public function scopeSchool() {
        $ids = $this->faculty()->pluck('school_id');
        return School::where('id', $ids);
    }


    public static function boot() {
        $studentRoleCreate = function ($model) {
            $school = $model->program()->first()->department()->first()
                                        ->faculty()->first()->school()->first();
            $role = Role::where('name', Role::STUDENT)->first();
            $user = $model->user()->first();
            if (!$user->roles()
                        ->wherePivot('school_id', $school->id)
                        ->wherePivot('role_id', $role->id)
                        ->exists()) {
                $user->roles()->attach([
                    $role->id => [
                        'school_id' => $school->id
                    ]
                ]);
            }
        };

        self::created($studentRoleCreate);
        self::updated($studentRoleCreate);

        self::deleting(function ($model) {
            $school = $model->program()->first()->department()->first()
                                        ->faculty()->first()->school()->first();
            $role = Role::where('name', Role::STUDENT)->first();
            $user = $model->user()->first();
            
            $user->roles()
                ->wherePivot('school_id', $school->id)
                ->wherePivot('role_id', $role->id)->detach($role->id);
        });
    }
}
