<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\School;
use App\Models\Staff;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Faculty
 *
 * @property int $id
 * @property string $name
 * @property int $school_id
 * @property int $dean_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faculty whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faculty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faculty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faculty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Faculty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Faculty extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [ 'name', 'school_id', 'dean_id' ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function dean() {
        return $this->belongsTo(Staff::class, 'dean_id');
    }

    public static function boot() {
        $schoolHasUsersUpdate = function ($model) {
            $staff = Staff::with('user')->find($model->dean_id);
            if ($staff->user) {
                $school = $model->school;
                if ($school) {
                    $school->users()->syncWithoutDetaching($staff->user->id);
                }
            }
        };

        self::created($schoolHasUsersUpdate);
        self::updated($schoolHasUsersUpdate);
    }
}
