<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\StudentTakesCourse;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentTakesCoursePolicy
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

    public function view(User $user, StudentTakesCourse $studentCourse) {
        return $user->schools()->where('schools.id', $studentCourse->school()->first()->id)->exists();
    }

    public function delete(User $user, StudentTakesCourse $studentCourse) {
        $course = $studentCourse->course()->first();

        return  $user->hasRole(Role::ADMIN) // administrator
                    ||
                (
                    ($user->id == $studentCourse->student()->user_id) || // user is student
                    ($user->id == $course->school()->first()->owner_id) || // school owner
                    ($user->id == $course->faculty()->first()->dean()->first()->user()->first()->id) || // dean of faculty
                    ($user->id == $course->department()->first()->hod()->first()->user()->first()->id) // hod of department
                );
    }

    public function update(User $user, StudentTakesCourse $studentCourse) {
        return $this->delete($user, $studentCourse);
    }
}
