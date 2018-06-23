<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Semester;
use App\Models\Level;
use App\Models\School;
use App\Models\SemesterType;

/**
 * App\Models\ProgramCredit
 *
 * @property int $id
 * @property int $program_id
 * @property int $semester_id
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
    protected $fillable = [ 'program_id', 'semester_id', 'level_id', 'credit' ];

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function level() {
        return $this->belongsTo(Level::class);
    }

    public function scopeSchool() {
        $ids = $this->level()->pluck('levels.school_id');
        return School::whereIn('id', $ids);
    }
}
