<?php

namespace App\Policies;

use App\User;
use App\Models\Image;
use App\Models\Role;
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
        return $user->hasRole(Role::ADMIN) || ($user->id == $image->school()->first()->owner_id);
    }

    public function update(User $user, Image $image) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $image->school()->first()->owner_id);
    }
}
