<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\School;

/**
 * App\Models\GradeType
 *
 * @property int $id
 * @property string $name
 * @property int $value
 * @property int $school_id
 * @property int $minimum
 * @property int $maximum
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GradeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GradeType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Grade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Grade whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GradeType extends BaseModel
{
    protected $fillable = [ 'name', 'value', 'school_id', 'minimum', 'maximum' ];

    public function school() {
        return $this->belongsTo(School::class);
    }
}
