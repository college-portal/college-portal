<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\GradeType;
use Illuminate\Auth\Access\HandlesAuthorization;

class GradeTypePolicy
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

    public function view(User $user, GradeType $gradeType) {
        return $user->schools()->where('schools.id', $gradeType->school_id)->exists();
    }

    public function delete(User $user, GradeType $gradeType) {
        return $user->hasRole(Role::ADMIN) || $user->id == $gradeType->school()->first()->owner_id;
    }

    public function update(User $user, GradeType $gradeType) {
        return $this->delete($user, $gradeType);
    }
}
