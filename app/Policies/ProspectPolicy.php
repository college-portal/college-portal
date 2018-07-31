<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\Prospect;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProspectPolicy
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

    public function view(User $user, Prospect $prospect) {
        return $user->hasRole(Role::ADMIN) || $user->hasRole(Role::SCHOOL_OWNER, $prospect->school_id);
    }

    public function delete(User $user, Prospect $prospect) {
        return $user->hasRole(Role::ADMIN) || $user->hasRole(Role::SCHOOL_OWNER, $prospect->school_id);
    }

    public function update(User $user, Prospect $prospect) {
        return $user->hasRole(Role::ADMIN) || $user->hasRole(Role::SCHOOL_OWNER, $prospect->school_id);
    }
}
