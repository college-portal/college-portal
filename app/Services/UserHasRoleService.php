<?php

namespace App\Services;

use App\Rules\AbsentRule;
use App\Repositories\UserHasRoleRepository;
use Carbon\Carbon;

class UserHasRoleService
{
    public function repo()
    {
        return app(UserHasRoleRepository::class);
    }

    public function update($id, $opts = []) {
        request()->validate([
            'user_id' => 'numeric|exists:users,id',
            'role_id' => 'numeric|exists:roles,id',
            'school_id' => 'numeric|exists:schools,id'
        ]);

        return $this->repo()->update($id, $opts);
    }
}