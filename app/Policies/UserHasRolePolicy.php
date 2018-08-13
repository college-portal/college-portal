<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\UserHasRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserHasRolePolicy
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

    public function view(User $user, UserHasRole $userHasRole) {
        return $user->can('view', $userHasRole->user()->first());
    }

    public function delete(User $user, UserHasRole $userHasRole) {
        return $user->hasRole(Role::ADMIN) || $user->hasRole(Role::SCHOOL_OWNER, $userHasRole->school_id);
    }

    public function update(User $user, UserHasRole $userHasRole) {
        return $user->hasRole(Role::ADMIN) || $user->hasRole(Role::SCHOOL_OWNER, $userHasRole->school_id);
    }
}
