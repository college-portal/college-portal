<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\ModelTableNameTrait;
use App\Traits\ImageableTrait;
use App\Traits\FullNameTrait;
use App\Traits\FilterableTrait;
use App\Models\Role;
use App\Models\School;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Course;
use App\Models\Department;
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
    use Notifiable, ModelTableNameTrait, ImageableTrait, FullNameTrait, FilterableTrait;

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
        return $this->belongsToMany(School::class, UserHasRole::name())->withTimestamps();
    }

    public function scopeUsers() {
        /** get users in schools that intersect with the current user's */
        $table_name = UserHasRole::name();
        return $this->schools()
                    ->join("$table_name as pivot", 'schools.id', '=', 'pivot.school_id')
                    ->join('users as others', 'others.id', '=', 'pivot.user_id')
                    ->where('others.id', '!=', $this->id)
                    ->select('others.*');
    }

    public function scopeFaculties() {
        /** get faculties in schools that intersect with the current user's */
        $ids = $this->schools()->pluck('schools.id');
        return Faculty::whereIn('school_id', $ids);
    }

    public function scopeDepartments() {
        /** get departments in faculties in schools that intersect with the current user's */
        $ids = $this->faculties()->pluck('faculties.id');
        return Department::whereIn('faculty_id', $ids);
    }

    public function scopePrograms() {
        /** get programs in departments in faculties in schools that intersect with the current user's */
        $ids = $this->departments()->pluck('departments.id');
        return Program::whereIn('department_id', $ids);
    }

    public function scopeCourses() {
        /** get courses in departments in faculties in schools that intersect with the current user's */
        $ids = $this->departments()->pluck('departments.id');
        return Course::whereIn('department_id', $ids);
    }

    public function scopeViewableStudents() {
        $ids = $this->schools()->pluck('schools.id');
        return Student::whereHas('user', function ($q) use ($ids) {
            return $q->whereHas('schools', function ($q) use ($ids) {
                return $q->whereIn('schools.id', $ids);
            });
        });
    }

    public function scopeViewableStaff() {
        $ids = $this->schools()->pluck('schools.id');
        return Staff::whereHas('user', function ($q) use ($ids) {
            return $q->whereHas('schools', function ($q) use ($ids) {
                return $q->whereIn('schools.id', $ids);
            });
        });
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function staff() {
        return $this->hasMany(Staff::class);
    }

    public function hasRole($role_names) {
        if (!is_array($role_names)) return $this->roles()->where('name', $role_names)->exists();
        else return $this->roles()->whereIn('name', $role_names)->exists();
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
