<?php

namespace App\Services;

use App\Models\InviteRole;
use App\Repositories\InviteRepository;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Collection;

class InviteService
{
    public function repo()
    {
        return app(InviteRepository::class);
    }

    public function create($opts) {
        $invite = $this->repo()->create($opts);

        if (isset($opts['role_id'])) {
            $role_id = $opts['role_id'];
            $invite->roles()->create([
                'role_id' => $role_id
            ]);
        }
        else if (isset($opts['roles'])) {
            $roleIds = new Collection($opts['roles']);
            $roleIds->map(function ($data) use ($invite) {
                $invite->roles()->create([
                    'role_id' => $data['role_id'],
                    'extras' => isset($data['extras']) ? $data['extras'] : null
                ]);
            });
        }
        else {
            throw ValidationException::withMessages([
                'role_id' => 'should exist if "roles" are absent"',
                'roles' => 'should exist if "role_id" is absent"'
            ]);
        }
        $invite->load('roles');
        return $invite;
    }
}