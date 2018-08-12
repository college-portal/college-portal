<?php

namespace App\Policies;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\ImageType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImageTypePolicy
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

    public function view(User $user, ImageType $imageType) {
        return $user->schools()->where('schools.id', $imageType->school_id)->exists();
    }

    public function delete(User $user, ImageType $imageType) {
        return $user->hasRole(Role::ADMIN) || $user->id == $imageType->school()->first()->owner_id;
    }

    public function update(User $user, ImageType $imageType) {
        return $this->delete($user, $imageType);
    }
}
