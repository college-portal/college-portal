<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Staff;
use App\Models\Course;
use App\Models\StudentTakesCourse;
use App\User;

/**
 * App\Models\StaffTeachCourse
 *
 * @property int $id
 * @property int $staff_id
 * @property int $course_id
 * @property int $semester_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StaffTeachCourse whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StaffTeachCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StaffTeachCourse whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StaffTeachCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\StaffTeachCourse whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StaffTeachCourse extends BaseModel
{
    protected $fillable = [ 'staff_id', 'course_id', 'semester_id' ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function staff() {
        return $this->belongsTo(Staff::class);
    }

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function studentTakesCourse() {
        return $this->hasMany(StudentTakesCourse::class, 'staff_teach_course_id');
    }

    public function scopeSchool() {
        $ids = $this->staff()->pluck('school_id');
        return School::whereIn('id', $ids);
    }

    public static function boot() {
        self::deleting(function ($model) {
            $model->studentTakesCourse()->get()->map(function ($studentCourse) {
                $studentCourse->delete();
            });
        });
    }
}
