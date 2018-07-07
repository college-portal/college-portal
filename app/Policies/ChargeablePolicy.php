<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\Chargeable;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChargeablePolicy
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

    public function view(User $user, Chargeable $chargeable) {
        return $user->schools()->where('schools.id', $chargeable->school()->first()->id)->exists();
    }

    public function delete(User $user, Chargeable $chargeable) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $chargeable->school()->first()->user_id);
    }

    public function update(User $user, Chargeable $chargeable) {
        return $this->delete($user, $chargeable);
    }
}
