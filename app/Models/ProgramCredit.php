<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\ProgramCredit
 *
 * @property int $id
 * @property string $name
 * @property int $program_id
 * @property int $semester_type_id
 * @property int $level_id
 * @property int $credit
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProgramCredit whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProgramCredit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProgramCredit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProgramCredit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProgramCredit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProgramCredit extends BaseModel
{

}
