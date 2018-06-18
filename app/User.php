<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\ModelTableNameTrait;
use App\Traits\ImageableTrait;
use App\Traits\FullNameTrait;
use App\Models\Role;
use App\Models\School;
use App\Models\UserHasRole;

/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $other_names
 * @property string $display_name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property date $dob
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ChargeableService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, ModelTableNameTrait, ImageableTrait, FullNameTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'other_names', 'display_name', 'email', 'password', 'dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, UserHasRole::name())->withTimestamps();;
    }

    public function schools() {
        return $this->hasMany(School::class, 'owner_id');
    }
}
