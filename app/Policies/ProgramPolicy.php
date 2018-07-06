<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\Program;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramPolicy
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

    public function view(User $user, Program $program) {
        return $user->schools()->where('schools.id', $program->department()->first()->faculty()->first()->school_id)->exists();
    }

    public function delete(User $user, Program $program) {
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $program->department->hod->user->id) || 
                ($user->id == $program->department->faculty->dean->user->id) || 
                ($user->id == $program->department->faculty->school->owner_id);
    }

    public function update(User $user, Program $program) {
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $program->department->hod->user->id) || 
                ($user->id == $program->department->faculty->dean->user->id) || 
                ($user->id == $program->department->faculty->school->owner_id);
    }
}
