<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\ContentType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentTypePolicy
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

    public function view(User $user, ContentType $contentType) {
        return $user->schools()->where('schools.id', $contentType->school_id)->exists();
    }

    public function delete(User $user, ContentType $contentType) {
        return $user->hasRole(Role::ADMIN) || $user->id == $contentType->school()->first()->owner_id;
    }

    public function update(User $user, ContentType $contentType) {
        return $this->delete($user, $contentType);
    }
}
