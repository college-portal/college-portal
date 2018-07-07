<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function view(User $user, User $other) {
        return $user->intersectsSchoolsWith($other)->exists();
    }

    public function delete(User $user, User $other) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $other->id);
    }

    public function update(User $user, User $other) {
        return $this->delete($user, $other);
    }
}
