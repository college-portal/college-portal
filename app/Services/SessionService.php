<?php

namespace App\Services;

use App\Repositories\SessionRepository;
use Carbon\Carbon;

class SessionService
{
    public function repo()
    {
        return app(SessionRepository::class);
    }
}