<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Carbon\Carbon;

class UserService extends BaseService
{
    public function repo()
    {
        return app(UserRepository::class);
    }
}