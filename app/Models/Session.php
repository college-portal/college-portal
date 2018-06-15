<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\School;
use App\Models\Semester;

/**
 * App\Models\Session
 *
 * @property int $id
 * @property int $school_id
 * @property int $name
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property \Carbon\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Session whereCreatedAt($value)
 * @mixin \Eloquent
 */
class Session extends BaseModel
{
    public function school() {
        return $this->belongsTo(School::class);
    }

    public function semesters() {
        return $this->hasMany(Semester::class);
    }
}
