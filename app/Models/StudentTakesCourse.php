<?php

namespace App\Models;

use App\Models\BaseModel;

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

}
