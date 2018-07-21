<?php

namespace App\Models;

use App\Models\Course;
use App\Models\School;
use App\Models\ProgramCredit;
use App\Models\BaseModel;

/**
 * App\Models\Level
 *
 * @property int $id
 * @property string $name
 * @property int $school_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Level extends BaseModel
{
    protected $fillable = [ 'name', 'school_id' ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function programCredits() {
        return $this->hasMany(ProgramCredit::class);
    }

    public static function boot() {
        self::deleting(function ($model) {
            $model->programCredits()->get()->map(function ($programCredit) {
                $programCredit->delete();
            });
        });
    }
}
