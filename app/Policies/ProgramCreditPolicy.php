<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\ProgramCredit;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramCreditPolicy
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

    public function view(User $user, ProgramCredit $credit) {
        return $user->schools()->where('schools.id', $credit->school()->first()->id)->exists();
    }

    public function delete(User $user, ProgramCredit $credit) {
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $credit->program->department->hod->user->id) || 
                ($user->id == $credit->program->department->faculty->dean->user->id) || 
                ($user->id == $credit->school->owner_id);
    }

    public function update(User $user, ProgramCredit $credit) {
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $credit->program->department->hod->user->id) || 
                ($user->id == $credit->program->department->faculty->dean->user->id) || 
                ($user->id == $credit->school->owner_id);
    }
}
