<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\StaffTeachCourse;
use App\Models\Semester;
use App\Models\SemesterType;
use App\Models\Staff;
use App\Models\Student;
use App\Models\School;
use App\Models\Grade;

/**
 * App\Models\StudentTakesCourse
 *
 * @property int $id
 * @property int $student_id
 * @property int $staff_teach_course_id
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
    protected $fillable = [ 'student_id', 'staff_teach_course_id' ];

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

    public function grades() {
        return $this->hasMany(Grade::class);
    }

    public function staff() {
        return $this->staffCourses()
                    ->join(Staff::name(), 'staff.id', '=', 'staff_teach_courses.staff_id')
                    ->select('staff.*');
    }

    public function course() {
        return $this->staffCourses()
                    ->join(Course::name(), 'courses.id', '=', 'staff_teach_courses.course_id')
                    ->select('courses.*');
    }

    public function scopeSchool() {
        return $this->staff()
                    ->join(School::name(), 'schools.id', '=', 'staff.school_id')
                    ->select('schools.*');
    }

    public static function boot() {
        self::deleting(function ($model) {
            $model->grades()->get()->map(function ($grade) {
                $grade->delete();
            });
        });
    }
}
