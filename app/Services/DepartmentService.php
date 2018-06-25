<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;
use Carbon\Carbon;

class DepartmentService extends BaseService
{
    public function repo()
    {
        return app(DepartmentRepository::class);
    }
}