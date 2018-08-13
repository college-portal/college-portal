<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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

    public function view(User $user, Role $role) {
        return true;
    }

    public function delete(User $user, Role $role) {
        return $user->hasRole(Role::ADMIN);
    }

    public function update(User $user, Role $role) {
        return $user->hasRole(Role::ADMIN);
    }
}
