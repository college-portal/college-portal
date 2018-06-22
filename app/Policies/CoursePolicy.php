<?php

namespace App\Policies;

use App\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
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

    public function view(User $user, Course $course) {
        return $user->schools()->where('schools.id', $course->school()->first()->id)->exists();
    }

    public function delete(User $user, Course $course) {
        return ($user->id == $course->department()->first()->hod()->first()->user()->first()->id) || // hod of department
                ($user->id == $course->faculty()->first()->dean()->first()->user()->first()->id) || // dean of faculty
                ($user->id == $course->school()->first()->owner_id) || // school owner
                ($user->hasRole('admin')); // administrator
    }

    public function update(User $user, Course $course) {
        return $this->delete($user, $course);
    }
}
