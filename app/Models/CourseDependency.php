<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Course;

/**
 * App\Models\CourseDependency
 * 
 * Course Dependencies point to courses a students needs to have passed 
 *  before he/she can subscribe to a course.
 * E.g. You must pass MATH 101 to subscribe to MATH 201
 *
 * @property int $id
 * @property int $course_id
 * @property int $dependency_id
 * @property \Carbon\Carbon $created_date
 * @property \Carbon\Carbon $updated_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseDependency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CourseDependency whereName($value)
 * @mixin \Eloquent
 */
class CourseDependency extends BaseModel
{
    protected $fillable = [ 'course_id', 'dependency_id' ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function dependency() {
        return $this->belongsTo(Course::class, 'dependency_id');
    }
}
