<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Semester;
use App\Models\School;

/**
 * App\Models\SemesterType
 * 
 * A Semester Type represents a group of Semesters, and 
 *  belonging to a School. 
 * E.g. 1st Semester
 *
 * @property int $id
 * @property int $name
 * @property int $school_id
 * @property \Carbon\Carbon $created_date
 * @property \Carbon\Carbon $updated_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SemesterType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SemesterType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SemesterType extends BaseModel
{
    protected $fillable = [ 'name', 'school_id' ];

    public function semesters() {
        return $this->hasMany(Semester::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }
}
