<?php

namespace App\Models;

use App\User;
use App\Models\School;
use App\Models\Program;
use App\Models\BaseModel;

/**
 * App\Models\Prospect
 *
 * @property int $id
 * @property int $school_id
 * @property int $program_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prospect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prospect whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prospect whereProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prospect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prospect whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Prospect extends BaseModel
{
    protected $fillable = [ 'school_id', 'program_id' ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public static function boot() {
        
    }
}
