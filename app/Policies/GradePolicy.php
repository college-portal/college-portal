<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\Grade;
use Illuminate\Auth\Access\HandlesAuthorization;

class GradePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Grade $grade) {
        $student = $grade->student()->first();
        return $user->can('update', $student) || 
                ($user->id == $grade->user()->first()->id) || 
                ($user->id == $grade->staff()->first()->user_id);
    }

    public function delete(User $user, Grade $grade) {
        $studentCourse = $grade->studentTakesCourse()->first();
        $course = $grade->course()->first();

        return  $user->hasRole(Role::ADMIN) // administrator
                    ||
                (
                    ($user->id == $studentCourse->staff()->first()->user_id) || // user is student
                    ($user->id == $studentCourse->school()->first()->owner_id) || // school owner
                    ($user->id == $course->faculty()->first()->dean()->first()->user()->first()->id) || // dean of faculty
                    ($user->id == $course->department()->first()->hod()->first()->user()->first()->id) // hod of department
                );
    }

    public function update(User $user, Grade $grade) {
        return $this->delete($user, $grade);
    }
}
