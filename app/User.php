<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\ModelTableNameTrait;
use App\Traits\ImageableTrait;
use App\Traits\FullNameTrait;
use App\Models\Role;
use App\Models\School;
use App\Models\Student;
use App\Models\UserHasRole;
use App\Models\SchoolHasUser;

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
        return $this->belongsToMany(School::class, SchoolHasUser::name());
    }

    public function scopeUsers() {
        /** get users in schools that intersect with the current user's */
        return $this->schools()
                    ->join('school_has_users as pivot', 'schools.id', '=', 'pivot.school_id')
                    ->join('users as others', 'others.id', '=', 'pivot.user_id')
                    ->where('others.id', '!=', $this->id)
                    ->select('others.*');
    }

    public function scopeFaculties() {
        /** get faculties in schools that intersect with the current user's */
        return $this->schools()
                    ->select('faculties.*', 'faculties.name as faculty_name', 'faculties.id as faculty_id')
                    ->join('faculties', 'schools.id', '=', 'faculties.school_id');
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function scopeIntersectsSchoolsWith($query, $user) {
        $ids = $user->schools()->pluck('schools.id');
        return $query->whereHas('schools', function ($q) use ($ids) {
            return $q->whereIn('schools.id', $ids);
        });
    }

    public static function boot() {
        $hashPasswordHandler = function ($model) {
            if ($model->password) {
                $model->password = bcrypt($model->password);
            }
        };

        $setRememberTokenHandler = function ($model) {
            $model->remember_token = str_random(10);
        };

        self::creating($hashPasswordHandler);
        self::updating($hashPasswordHandler);
        self::creating($setRememberTokenHandler);
    }
}
