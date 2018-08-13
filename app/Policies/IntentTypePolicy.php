<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\IntentType;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntentTypePolicy
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

    public function view(User $user, IntentType $intentType) {
        return true;
    }

    public function delete(User $user, IntentType $intentType) {
        return $user->hasRole(Role::ADMIN);
    }

    public function update(User $user, IntentType $intentType) {
        return $user->hasRole(Role::ADMIN);
    }
}
