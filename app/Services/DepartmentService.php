<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;
use Carbon\Carbon;

class DepartmentService
{
    public function repo()
    {
        return app(DepartmentRepository::class);
    }
}