<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\Semester;
use Illuminate\Auth\Access\HandlesAuthorization;

class SemesterPolicy
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

    public function view(User $user, Semester $semester) {
        return $user->schools()->where('schools.id', $semester->type()->first()->school_id)->exists();
    }

    public function delete(User $user, Semester $semester) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $semester->school()->first()->owner_id);
    }

    public function update(User $user, Semester $semester) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $semester->school()->first()->owner_id);
    }
}
