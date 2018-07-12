<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\Intent;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntentPolicy
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

    public function view(User $user, Intent $intent) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $intent->user_id);
    }

    public function delete(User $user, Intent $intent) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $intent->user_id);
    }

    public function update(User $user, Intent $intent) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $intent->user_id);
    }
}
