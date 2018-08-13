<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\Session;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
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

    public function view(User $user, Session $session) {
        return $user->hasRole(Role::ADMIN) || $user->schools()->where('schools.id', $session->school_id)->exists();
    }

    public function delete(User $user, Session $session) {
        return $user->hasRole(Role::ADMIN) || $user->id == $session->school()->first()->owner_id;
    }

    public function update(User $user, Session $session) {
        return $this->delete($user, $session);
    }
}
