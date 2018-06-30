<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\StaffTeachCourse;
use App\Models\Semester;
use App\Models\Student;
use App\Models\School;

/**
 * App\Models\StudentTakesCourse
 *
 * @property int $id
 * @property int $student_id
 * @property int $staff_teach_course_id
 * @property int $semester_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentTakesCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StudentTakesCourse whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StudentTakesCourse extends BaseModel
{
    protected $fillable = [ 'student_id', 'staff_teach_course_id', 'semester_id' ];

    protected $table = 'student_takes_courses';

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function staffCourses() {
        return $this->belongsToMany(StaffTeachCourse::class, self::name(), 'id', 'staff_teach_course_id');
    }

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function staff() {
        return $this->staffCourses()
                    ->join('staff', 'staff.id', '=', 'staff_teach_courses.staff_id')
                    ->select('staff.*');
    }

    public function course() {
        return $this->staffCourses()
                    ->join('courses', 'courses.id', '=', 'staff_teach_courses.course_id')
                    ->select('courses.*');
    }

    public function scopeSchool() {
        return $this->belongsToMany(Semester::class, self::name(), 'id', 'semester_id')
                    ->join('semester_types', 'semester_types.id', '=', 'semesters.semester_type_id')
                    ->join('schools', 'schools.id', '=', 'semester_types.school_id')
                    ->select('schools.*');
    }
}
