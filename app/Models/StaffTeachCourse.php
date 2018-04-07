<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Staff;
use App\Models\Course;
use App\User;

/**
 * App\Models\StaffTeachCourse
 *
 * @property int $id
 * @property int $staff_id
 * @property int $course_id
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
    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function staff() {
        return $this->belongsTo(Staff::class);
    }

    public function user() {
        return $this->staff()->user();
    }
}
