<?php

namespace App\Traits;

use App\User;
use App\Models\Role;

trait TestJsonWebTokenTrait
{
    public function loginAs(User $user)
    {
        $token = \JWTAuth::fromUser($user);
        return $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
        ])->actingAs($user);
    }

    public function loginAsRole($role_names)
    {
        $user = $this->findRoleUser($role_names);
        return $this->loginAs($user);
    }

    protected function findRoleUser($role_names): User {
        return User::whereHas('roles', function ($q) use ($role_names) {
            if (!is_array($role_names)) return $q->where('roles.name', $role_names);
            else return $q->whereIn('roles.name', $role_names);
        })->first();
    }

    public function createUser($opts = null) {
        return $opts ? (User::where($opts)->first() ?? factory(User::class, 1)->create($opts ?? [])->first()) : factory(User::class, 1)->create($opts ?? [])->first();
    }
}