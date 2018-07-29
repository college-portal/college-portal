<?php

namespace App\Models;

use App\User;
use App\Models\School;
use App\Models\Program;
use App\Models\Session;
use App\Models\BaseModel;

/**
 * App\Models\Prospect
 * 
 * A prospect is a user who is an admission candidate to a particular school,
 *  in a particular program and targeting a particular session.
 * 
 * A prospect can be locked for editing by a school-owner, similar to closing the 
 *  admission process.
 *
 * @property int $id
 * @property int $user_id
 * @property int $school_id
 * @property int $program_id
 * @property int $session_id
 * @property \Carbon\Carbon $locked_at
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
    protected $fillable = [ 'user_id', 'school_id', 'program_id', 'session_id', 'locked_at' ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function session() {
        return $this->belongsTo(Session::class);
    }

    public static function boot() {
        
    }
}
