<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\SemesterType;
use Illuminate\Auth\Access\HandlesAuthorization;

class SemesterTypePolicy
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

    public function view(User $user, SemesterType $type) {
        return $user->schools()->where('schools.id', $type->school_id)->exists();
    }

    public function delete(User $user, SemesterType $type) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $type->school()->first()->owner_id);
    }

    public function update(User $user, SemesterType $type) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $type->school()->first()->owner_id);
    }
}
