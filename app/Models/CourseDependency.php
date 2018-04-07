<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\CourseDependency
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

}
