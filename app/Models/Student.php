<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\Student
 *
 * @property int $id
 * @property int $user_id
 * @property int $department_id
 * @property string $matric_no
 * @property string $address
 * @property string $phone
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Student whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Student extends BaseModel
{

}
