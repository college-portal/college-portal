<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\ModelTableNameTrait;
use App\Traits\ImageableTrait;
use App\Traits\FullNameTrait;
use App\Traits\FilterableTrait;
use App\Traits\AuthorizableTrait;
use App\Models\Role;
use App\Models\School;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\Course;
use App\Models\Session;
use App\Models\Semester;
use App\Models\Department;
use App\Models\UserHasRole;
use App\Models\ChargeableService;
use App\Models\Chargeable;
use App\Models\ProgramCredit;
use App\Models\Payable;
use App\Models\CourseDependency;
use App\Models\IntentType;
use App\Models\Intent;

/**
 * App\User
 *
 * @property int $id
 * @property string $google_id
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
    use Notifiable, ModelTableNameTrait, ImageableTrait, FullNameTrait, FilterableTrait, AuthorizableTrait;

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
        'google_id', 'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, UserHasRole::name())->withTimestamps();;
    }

    public function schools() {
        return $this->belongsToMany(School::class, UserHasRole::name())->withTimestamps();
    }

    public function intents() {
        return $this->belongsToMany(IntentType::class, Intent::name())->withTimestamps();
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

    public function scopeProgramCredits() {
        /** get programs in departments in faculties in schools that intersect with the current user's */
        $ids = $this->programs()->pluck('programs.id');
        return ProgramCredit::whereIn('program_id', $ids);
    }

    public function scopeCourses() {
        /** get courses in departments in faculties in schools that intersect with the current user's */
        $ids = $this->departments()->pluck('departments.id');
        return Course::whereIn('department_id', $ids);
    }

    public function scopeCourseDependencies() {
        /** get courses in departments in faculties in schools that intersect with the current user's */
        $ids = $this->courses()->pluck('courses.id');
        return CourseDependency::whereIn('course_id', $ids);
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

    public function scopeSessions() {
        $ids = $this->schools()->pluck('schools.id');
        return Session::whereIn('school_id', $ids);
    }

    public function scopeSemesters() {
        $ids = $this->schools()->pluck('schools.id');
        return Semester::whereHas('type', function ($q) use ($ids) {
            return $q->whereIn('school_id', $ids);
        });
    }

    public function scopeChargeableServices() {
        $ids = $this->schools()->pluck('schools.id');
        return ChargeableService::whereIn('school_id', $ids);
    }

    public function scopeChargeables() {
        $ids = $this->chargeableServices()->pluck('chargeable_services.id');
        return Chargeable::whereIn('chargeable_service_id', $ids);
    }

    public function scopeManagedSchools($query, User $user = null) {
        return School::where('owner_id', isset($user) ? $user->id : $this->id);
    }

    public function scopeManagedFaculties($query, User $user = null) {
        $ids = Staff::where('user_id', isset($user) ? $user->id : $this->id)->pluck('staff.id');
        return Faculty::whereIn('dean_id', $ids);
    }

    public function scopeManagedDepartments($query, User $user = null) {
        $ids = Staff::where('user_id', isset($user) ? $user->id : $this->id)->pluck('staff.id');
        return Department::whereIn('hod_id', $ids);
    }

    public function scopeManagedSchoolsUsers() {
        $table_name = UserHasRole::name();
        return $this->managedSchools()
                    ->join("$table_name as pivot", 'schools.id', '=', 'pivot.school_id')
                    ->join('users as others', 'others.id', '=', 'pivot.user_id')
                    ->select('others.*');
    }

    public function scopeManagedFacultiesUsers() {
        $table_name = UserHasRole::name();
        return $this->managedFaculties()
                    ->join('schools', 'faculties.school_id', '=', 'schools.id')
                    ->join("$table_name as pivot", 'schools.id', '=', 'pivot.school_id')
                    ->join('users as others', 'others.id', '=', 'pivot.user_id')
                    ->select('others.*');
    }

    public function scopeManagedDepartmentsUsers() {
        $table_name = UserHasRole::name();
        return $this->managedDepartments()
                    ->join('faculties', 'faculties.id', '=', 'departments.faculty_id')
                    ->join('schools', 'faculties.school_id', '=', 'schools.id')
                    ->join("$table_name as pivot", 'schools.id', '=', 'pivot.school_id')
                    ->join('users as others', 'others.id', '=', 'pivot.user_id')
                    ->select('others.*');
    }

    public function scopeViewablePayables() {
        $q = app(Payable::class);
        if ($this->hasRole(Role::ADMIN)) {
            return $q;
        }
        else if ($this->hasRole(Role::SCHOOL_OWNER)) {
            $ids = $this->managedSchoolsUsers()
                        ->select('others.id')->pluck('others.id');
            return $q->whereIn('user_id', $ids);
        }
        else if ($this->hasRole(Role::DEAN)) {
            $ids = $this->managedFacultiesUsers()
                        ->select('others.id')->pluck('others.id');
            return $q->whereIn('user_id', $ids);
        }
        else if ($this->hasRole(Role::HOD)) {
            $ids = $this->managedDepartmentsUsers()
                        ->select('others.id')->pluck('others.id');
            return $q->whereIn('user_id', $ids);
        }
        else return $this->payables();
    }
  
    public function students() {
        return $this->hasMany(Student::class);
    }

    public function staff() {
        return $this->hasMany(Staff::class);
    }

    public function payables() {
        return $this->hasMany(Payable::class);
    }

    public function hasRole($role_names, $school_id = null) {
        $q = $this->roles();
        if ($school_id) {
            $q = $q->where('school_id', $school_id);
        }
        if (!is_array($role_names)) return $q->where('name', $role_names)->exists();
        else return $q->whereIn('name', $role_names)->exists();
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
