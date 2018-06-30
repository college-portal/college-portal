<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\StaffTeachCourse;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaffTeachCoursePolicy
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

    public function view(User $user, StaffTeachCourse $staffCourse) {
        return $user->schools()->where('schools.id', $staffCourse->school()->first()->id)->exists();
    }

    public function delete(User $user, StaffTeachCourse $staffCourse) {
        $course = $staffCourse->course()->first();

        return  $user->hasRole(Role::ADMIN) // administrator
                    ||
                (
                    ($user->id == $course->school()->first()->owner_id) || // school owner
                    ($user->id == $course->faculty()->first()->dean()->first()->user()->first()->id) || // dean of faculty
                    ($user->id == $course->department()->first()->hod()->first()->user()->first()->id) // hod of department
                );
    }

    public function update(User $user, StaffTeachCourse $staffCourse) {
        return $this->delete($user, $staffCourse);
    }
}
