<?php

namespace App\Policies;

use App\User;
use App\Models\School;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolPolicy
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

    public function view(User $user, School $school) {
        return $user->id == $school->owner_id;
    }

    public function delete(User $user, School $school) {
        return $user->id == $school->owner_id;
    }

    public function update(User $user, School $school) {
        return $user->id == $school->owner_id;
    }
}
