<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\Staff;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaffPolicy
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

    public function view(User $user, Staff $staff) {
        return $user->schools()->where('schools.id', $staff->school()->first()->id)->exists();
    }

    public function delete(User $user, Staff $staff) {
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $staff->faculty()->first()->dean()->first()->user()->first()->id) || 
                ($user->id == $staff->department()->first()->hod()->first()->user()->first()->id) || 
                ($user->id = $staff->school()->first()->owner_id);
    }

    public function update(User $user, Staff $staff) {
        return $this->delete($user, $staff);
    }
}
