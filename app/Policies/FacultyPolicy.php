<?php

namespace App\Policies;

use App\User;
use App\Models\Faculty;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacultyPolicy
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

    public function view(User $user, Faculty $faculty) {
        return $user->schools()->where('schools.id', $faculty->school_id)->exists();
    }

    public function delete(User $user, Faculty $faculty) {
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $faculty->dean()->first()->user()->first()->id) || 
                ($user->id == $faculty->school()->first()->owner_id);
    }

    public function update(User $user, Faculty $faculty) {
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $faculty->dean()->first()->user()->first()->id) || 
                ($user->id == $faculty->school()->first()->owner_id);
    }
}
