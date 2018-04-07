<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\Course
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

}
