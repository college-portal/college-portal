<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\Content;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
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

    public function view(User $user, Content $content) {
        return $user->hasRole(Role::ADMIN) || $user->schools()->where('schools.id', $content->school()->first()->id)->exists();
    }

    public function delete(User $user, Content $content) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $content->school()->first()->owner_id) || $user->can('delete', $content->owner()->first());
    }

    public function update(User $user, Content $content) {
        return $user->hasRole(Role::ADMIN) || ($user->id == $content->school()->first()->owner_id) || $user->can('update', $content->owner()->first());
    }
}
