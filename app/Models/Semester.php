<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\Semester
 *
 * @property int $id
 * @property int $semester_type_id
 * @property int $session_id
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property \Carbon\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Semester whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Semester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Semester whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Semester whereCreatedAt($value)
 * @mixin \Eloquent
 */
class Semester extends BaseModel
{

}
