<?php

namespace App\Models;

use App\User;
use App\Models\InviteRole;

/**
 * App\Models\Invite
 *
 * @property int $id
 * @property int $creator_id
 * @property int $school_id
 * @property int $email
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Invite extends BaseModel
{

    protected $fillable = [ 'creator_id', 'school_id', 'email', 'message' ];

    public function roles() {
        return $this->hasMany(InviteRole::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }

    public static function boot() {
        self::deleting(function ($model) {
            $model->roles()->get()->map(function ($role) {
                $role->delete();
            });
        });
    }
}
