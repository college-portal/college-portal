<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\Payable;
use Illuminate\Auth\Access\HandlesAuthorization;

class PayablePolicy
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

    public function view(User $user, Payable $payable) {
        $school = $payable->chargeable()->first()->service()->first()->school()->first();
        return ($user->id == $payable->user_id) || $user->can('update', $school);
    }

    public function delete(User $user, Payable $payable) {
        $school = $payable->chargeable()->first()->service()->first()->school()->first();
        return $user->can('update', $school);
    }

    public function update(User $user, Payable $payable) {
        $school = $payable->chargeable()->first()->service()->first()->school()->first();
        return $user->can('update', $school);
    }
}
