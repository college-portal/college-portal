<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Level;
use App\Models\School;
use App\Models\Department;
use App\Models\SemesterType;
use App\Models\CourseDependency;
use App\Models\Staff;
use App\Models\Faculty;
use App\Models\StaffTeachCourse;

/**
 * App\Models\Course
 * 
 * A Course represents a subject, managed by a department, 
 *  that students can subscribe to, learn and receive Grades for having learnt.
 *
 * @property int $id
 * @property int $department_id
 * @property int $semester_type_id
 * @property int $level_id
 * @property string $code
 * @property string $title
 * @property int $credit
 * @property \Carbon\Carbon $created_date
 * @property \Carbon\Carbon $updated_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereName($value)
 * @mixin \Eloquent
 */
class Course extends BaseModel
{

    protected $fillable = [ 'department_id', 'semester_type_id', 'level_id', 'code', 'title', 'credit' ];

    public function department() {
        return $this->belongsTo(Department::class);
    }
  
    public function semesterType() {
        return $this->belongsTo(SemesterType::class);
    }

    public function level() {
        return $this->belongsTo(Level::class);
    }
  
    public function scopeSchool() {
        $ids = $this->level()->pluck('school_id');
        return School::whereIn('id', $ids);
    }

    public function scopeFaculty() {
        $ids = $this->department()->pluck('faculty_id');
        return Faculty::whereIn('id', $ids);
    }
  
    public function dependencies() {
        return $this->belongsToMany(self::class, CourseDependency::name(), 'course_id', 'dependency_id')
                    ->withTimestamps();
    }

    public function staff() {
        return $this->belongsToMany(Staff::class, StaffTeachCourse::name(), 'course_id', 'staff_id')->withTimestamps();
    }

    public static function boot() {
        self::deleting(function ($model) {
            $model->hasOne(CourseDependency::class)->get()->map(function ($dependency) {
                $dependency->delete();
            });
            $model->hasOne(CourseDependency::class, 'dependency_id')->get()->map(function ($dependency) {
                $dependency->delete();
            });
            $model->hasOne(StaffTeachCourse::class)->get()->map(function ($staffCourse) {
                $staffCourse->delete();
            });
        });
    }
}
