<?php

namespace App\Models;

use App\User;
use App\Models\UserHasIntent;

/**
 * App\Models\Intent
 *
 * @property int $id
 * @property int $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Intent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Intent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Intent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Intent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Intent extends BaseModel
{
    public const CHANGE_PASSWORD = 'change-password';

    protected $fillable = [ 'name' ];

    public function users() {
        return $this->hasManyThrough(User::class, UserHasIntent::class)->withTimestamps();
    }
}
