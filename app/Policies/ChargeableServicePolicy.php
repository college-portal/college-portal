<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\ChargeableService;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChargeableServicePolicy
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

    public function view(User $user, ChargeableService $service) {
        return $user->schools()->where('schools.id', $service->school()->first()->id)->exists();
    }

    public function delete(User $user, ChargeableService $service) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $service->school()->first()->id);
    }

    public function update(User $user, ChargeableService $service) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $service->school()->first()->id);
    }
}
