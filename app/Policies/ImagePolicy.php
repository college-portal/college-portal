<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Image;
use CollegePortal\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
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

    public function view(User $user, Image $image) {
        return $user->schools()->where('schools.id', $image->school()->first()->id)->exists();
    }

    public function delete(User $user, Image $image) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $image->school()->first()->owner_id) || $user->can('delete', $image->owner()->first());
    }

    public function update(User $user, Image $image) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $image->school()->first()->owner_id) || $user->can('delete', $image->owner()->first());
    }
}
