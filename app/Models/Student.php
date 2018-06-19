<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Department;
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
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function department() {
        return $this->program()->department();
    }

    public function faculty() {
        return $this->department()->faculty();
    }

    public function school() {
        return $this->faculty()->school();
    }

    public static function boot() {
        self::created(function ($model) {
            $school = $model->program->department->faculty->school;
            if ($school) {
                $model->user->schools()->syncWithoutDetaching($school->id);
            }
        });
    }
}
