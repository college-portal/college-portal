<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\School;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolPolicy
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

    public function view(User $user, School $school) {
        return $user->hasRole(Role::ADMIN) || $user->schools()->where('schools.id', $school->id)->exists();
    }

    public function delete(User $user, School $school) {
        return $user->hasRole(Role::ADMIN) || $user->id == $school->owner_id;
    }

    public function update(User $user, School $school) {
        return $user->hasRole(Role::ADMIN) || $user->id == $school->owner_id;
    }
}
