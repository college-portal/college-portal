<?php

namespace App\Services;

use App\Repositories\PayableRepository;
use Carbon\Carbon;

class PayableService
{
    public function repo()
    {
        return app(PayableRepository::class);
    }
}