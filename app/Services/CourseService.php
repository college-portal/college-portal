<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use Carbon\Carbon;

class CourseService
{
    public function repo()
    {
        return app(CourseRepository::class);
    }
}