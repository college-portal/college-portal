<?php

namespace App\Services;

use App\Repositories\StaffRepository;
use Carbon\Carbon;

class StaffService extends BaseService
{
    public function repo()
    {
        return app(StaffRepository::class);
    }
}