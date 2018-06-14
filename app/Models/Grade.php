<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\StaffTeachCourse;
use App\Models\Student;
use App\Models\StudentTakesCourse;
use App\User;
use App\Models\Staff;
use App\Models\GradeType;

/**
 * App\Models\Grade
 *
 * @property int $id
 * @property int $student_takes_course_id
 * @property int $score
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Grade whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Grade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Grade whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Grade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Grade whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Grade extends BaseModel
{
    public function type() {
        return $this->belongsTo(GradeType::class);
    }

    function studentTakesCourse() {
        return $this->belongsTo(StudentTakesCourse::class);
    }

    public function student() {
        return $this->studentTakesCourse()->student();
    }

    public function staff() {
        return $this->studentTakesCourse()->staff();
    }

    public function course() {
        return $this->studentTakesCourse()->course();
    }
}
