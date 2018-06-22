<?php

namespace App\Policies;

use App\User;
use App\Models\Faculty;
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
        return ($user->id == $faculty->dean->user->id) || ($user->id == $faculty->school->owner_id);
    }

    public function update(User $user, Faculty $faculty) {
        return ($user->id == $faculty->dean->user->id) || ($user->id == $faculty->school->owner_id);
    }
}
