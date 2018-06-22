<?php

namespace App\Services;

use App\Repositories\ChargeableServiceRepository;
use Carbon\Carbon;

class ChargeableService
{
    public function repo()
    {
        return app(ChargeableServiceRepository::class);
    }
}