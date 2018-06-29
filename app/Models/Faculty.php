<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\School;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Role;
use App\Models\Program;
use App\Models\Department;
use App\User;
use Illuminate\Support\Facades\DB;
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

    public function deans() {
        return $this->belongsToMany(Staff::class, self::name(), 'id', 'dean_id');
    }

    public function departments() {
        return $this->hasMany(Department::class);
    }

    public function programs() {
        return $this->hasManyThrough(Program::class, Department::class);
    }

    public function students() {
        return $this->programs()
                    ->join(Student::name(), 'students.program_id', '=', 'programs.id')
                    ->select('students.*');
    }

    public function staff() {
        return $this->departments()
                    ->join(Staff::name(), 'staff.department_id', '=', 'departments.id')
                    ->select('staff.*');
    }

    public function users() {
        return $this->students()
                ->join(User::name(), 'students.user_id', '=', 'users.id')
                ->select('users.id', 
                            'users.display_name',  
                            'users.created_at', 
                            'users.updated_at'
                        )
                ->union(
                    $this->deans()
                        ->join(User::name(), 'staff.user_id', '=', 'users.id')
                        ->select('users.id', 
                                    'users.display_name',  
                                    'users.created_at', 
                                    'users.updated_at',
                                    'faculties.id as faculty_id'
                                )
                )
                ->union(
                    $this->staff()
                                ->join(User::name(), 'staff.user_id', '=', 'users.id')
                                ->select('users.id', 
                                            'users.display_name',  
                                            'users.created_at', 
                                            'users.updated_at',
                                            'departments.faculty_id'
                                        )
                ); 
    }

    public static function boot() {
        $schoolHasUsersUpdate = function ($model) {
            $role = Role::where('name', Role::DEAN)->first();
            $staff = Staff::with('user')->find($model->dean_id);
            $user = $staff->user()->first();
            $school = $model->school()->first();
            $school->users()->syncWithoutDetaching([
                $user->id => [
                    'role_id' => $role->id
                ]
            ]);

            $staffRole = Role::where('name', Role::STAFF)->first();
            $school->users()->syncWithoutDetaching([
                $user->id => [
                    'role_id' => $staffRole->id
                ]
            ]);
        };

        self::created($schoolHasUsersUpdate);
        self::updated($schoolHasUsersUpdate);
    }
}
