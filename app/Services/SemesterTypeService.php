<?php

namespace App\Services;

use App\Repositories\SemesterTypeRepository;
use Carbon\Carbon;

class SemesterTypeService
{
    public function repo()
    {
        return app(SemesterTypeRepository::class);
    }
}