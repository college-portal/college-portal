<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\Department;
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
        return $user->schools()->where('schools.id', $department->faculty()->first()->school_id)->exists();
    }

    public function delete(User $user, Department $department) {
        return $user->hasRole(Role::ADMIN) ||
                ($user->id == $department->hod()->first()->user()->first()->id) ||
                ($user->id == $department->faculty()->first()->dean()->first()->user()->first()->id) || 
                ($user->id == $department->faculty()->first()->school()->first()->owner_id);
    }

    public function update(User $user, Department $department) {
        return $this->delete($user, $department);
    }
}
