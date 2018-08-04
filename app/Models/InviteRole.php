<?php

namespace App\Models;

use App\User;
use App\Models\Invite;

/**
 * App\Models\InviteRole
 * 
 * An Invite Role represents the role an invited potential is supposed to assume in the system.
 *
 * @property int $id
 * @property int $invite_id
 * @property int $role_id
 * @property string $extras
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InviteRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InviteRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\InviteRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InviteRole extends BaseModel
{

    protected $fillable = [ 'invite_id', 'role_id', 'extras' ];

    public function invite() {
        return $this->belongsTo(Invite::class);
    }

    public function scopeSchool() {
        $ids = $this->invite()->pluck('school_id');
        return School::whereIn('id', $ids);
    }

    public function setExtrasAttribute($value) {
        if (!is_string($value)) {
            $this->attributes['extras'] = json_encode($value);
        }
        else {
            $this->attributes['extras'] = $value ?? '{}';
        }
    }
}
