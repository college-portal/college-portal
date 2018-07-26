<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\Invite;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvitePolicy
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

    public function view(User $user, Invite $invite) {
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $invite->creator_id) || 
                $user->hasRole([ Role::SCHOOL_OWNER, Role::INVITE_CREATOR ], $invite->school_id);
    }

    public function delete(User $user, Invite $invite) {
        return $user->hasRole(Role::ADMIN) || 
                $user->hasRole(Role::SCHOOL_OWNER, $invite->school_id) || 
                ($user->id == $invite->creator_id);
    }

    public function update(User $user, Invite $invite) {
        return false;
    }
}
