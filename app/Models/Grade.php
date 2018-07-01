<?php

namespace App\Models;

use App\Models\BaseModel;
use App\User;
use App\Models\Staff;
use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use App\Models\GradeType;
use App\Models\StaffTeachCourse;
use App\Models\StudentTakesCourse;

/**
 * App\Models\Grade
 *
 * @property int $id
 * @property int $student_takes_course_id
 * @property float $score
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
    protected $fillable = [ 'student_takes_course_id', 'score', 'description' ];

    function studentTakesCourse() {
        return $this->belongsTo(StudentTakesCourse::class);
    }

    public function student() {
        $ids = $this->studentTakesCourse()->pluck('student_id');
        return Student::whereIn('id', $ids);
    }

    public function scopeStaffTeachCourse() {
        $ids = $this->studentTakesCourse()->pluck('staff_teach_course_id');
        return StaffTeachCourse::whereIn('id', $ids);
    }

    public function scopeStaff() {
        $ids = $this->staffTeachCourse()->pluck('staff_id');
        return Staff::whereIn('id', $ids);
    }

    public function scopeCourse() {
        $ids = $this->staffTeachCourse()->pluck('course_id');
        return Course::whereIn('id', $ids);
    }

    public function scopeSchool() {
        $ids = $this->student()->pluck('school_id');
        return School::whereIn('id', $ids);
    }

    public function scopeUser() {
        $ids = $this->student()->pluck('user_id');
        return User::whereIn('id', $ids);
    }

    public function scopeTotal($query, $student_takes_course_id = null) {
        return $this->where('student_takes_course_id', $student_takes_course_id ?? $this->student_takes_course_id)
                    ->sum('score');
    }
}
