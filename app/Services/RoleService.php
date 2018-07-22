<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use App\Rules\AbsentRule;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class RoleService
{
    public function repo()
    {
        return app(RoleRepository::class);
    }

    public function update($id, $opts = []) {
        request()->validate([
            'name' => 'string',
            'display_name' => 'string',
            'created_at' => [ new AbsentRule() ],
            'updated_at' => [ new AbsentRule() ]
        ]);

        return $this->repo()->update($id, $opts);
    }
}