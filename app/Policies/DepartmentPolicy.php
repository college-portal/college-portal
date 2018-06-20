<?php

namespace App\Policies;

use App\User;
use App\Models\Department;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
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

    public function view(User $user, Department $department) {
        return $user->schools()->where('schools.id', $department->faculty->school_id)->exists();
    }

    public function delete(User $user, Department $department) {
        return ($user->id == $department->faculty->dean->user->id) || ($user->id == $department->faculty->school->owner_id);
    }

    public function update(User $user, Department $department) {
        return ($user->id == $department->faculty->dean->user->id) || ($user->id == $department->faculty->school->owner_id);
    }
}
