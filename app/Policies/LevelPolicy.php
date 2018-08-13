<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\Level;
use Illuminate\Auth\Access\HandlesAuthorization;

class LevelPolicy
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

    public function view(User $user, Level $level) {
        return $user->schools()->where('schools.id', $level->school_id)->exists();
    }

    public function delete(User $user, Level $level) {
        return $user->hasRole(Role::ADMIN) || $user->id == $level->school()->first()->owner_id;
    }

    public function update(User $user, Level $level) {
        return $user->hasRole(Role::ADMIN) || $user->id == $level->school()->first()->owner_id;
    }
}
