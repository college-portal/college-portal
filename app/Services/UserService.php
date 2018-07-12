<?php

namespace App\Services;

use App\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;

class UserService extends BaseService
{
    public function repo()
    {
        return app(UserRepository::class);
    }

    public function createFromGoogle($googleUser) {
        $user = new User();

        $names = explode(' ', $googleUser->name);
        if (isset($names[0])) $user->first_name = $names[0];
        if (isset($names[1])) $user->last_name = $names[1];
        if (isset($names[2])) $user->other_names = $names[2];

        $user->email = $googleUser->email;
        $user->google_id = $googleUser->id;
        $user->password = md5(rand(1,10000));

        $user->save();

        return $user;
    }
}