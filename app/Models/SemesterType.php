<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Semester;

/**
 * App\Models\SemesterType
 *
 * @property int $id
 * @property int $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SemesterType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SemesterType whereName($value)
 * @mixin \Eloquent
 */
class SemesterType extends BaseModel
{
    public function semesters() {
        return $this->hasMany(Semester::class);
    }
}
