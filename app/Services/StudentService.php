<?php

namespace App\Services;

use App\Repositories\StudentRepository;
use Carbon\Carbon;

class StudentService
{
    public function repo()
    {
        return app(StudentRepository::class);
    }
}