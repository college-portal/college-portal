<?php

namespace App\Services;

use App\Repositories\SemesterTypeRepository;
use Carbon\Carbon;

class SemesterTypeService extends BaseService
{
    public function repo()
    {
        return app(SemesterTypeRepository::class);
    }
}