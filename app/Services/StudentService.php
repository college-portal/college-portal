<?php

namespace App\Services;

use App\Repositories\StudentRepository;
use Carbon\Carbon;

class StudentService extends BaseService
{
    public function repo()
    {
        return app(StudentRepository::class);
    }
}