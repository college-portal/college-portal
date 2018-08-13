<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\Course;
use CollegePortal\Models\CourseDependency;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseDependencyPolicy
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

    public function view(User $user, CourseDependency $courseDependency) {
        return $user->schools()->where('schools.id', $courseDependency->course()->first()->school()->first()->id)->exists();
    }

    public function delete(User $user, CourseDependency $courseDependency) {
        $course = $courseDependency->course()->first();
        $dependency = $courseDependency->dependency()->first();
        return  ($user->hasRole(Role::ADMIN)) // administrator
                    ||
                ((
                    ($user->id == $course->school()->first()->owner_id) || // school owner
                    ($user->id == $course->faculty()->first()->dean()->first()->user()->first()->id) || // dean of faculty
                    ($user->id == $course->department()->first()->hod()->first()->user()->first()->id) // hod of department
                ) 
                    &&
                (
                    ($user->id == $dependency->school()->first()->owner_id) || // school owner
                    ($user->id == $dependency->faculty()->first()->dean()->first()->user()->first()->id) || // dean of faculty
                    ($user->id == $dependency->department()->first()->hod()->first()->user()->first()->id) // hod of department
                ));
    }

    public function update(User $user, CourseDependency $courseDependency) {
        return $this->delete($user, $courseDependency);
    }
}
