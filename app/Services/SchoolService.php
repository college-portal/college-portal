<?php

namespace App\Services;

use App\Repositories\SchoolRepository;
use Carbon\Carbon;

class SchoolService extends BaseService
{
    public function repo()
    {
        return app(SchoolRepository::class);
    }
}