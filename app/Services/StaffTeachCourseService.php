<?php

namespace App\Services;

use App\Repositories\StaffTeachCourseRepository;
use Carbon\Carbon;

class StaffTeachCourseService
{
    public function repo()
    {
        return app(StaffTeachCourseRepository::class);
    }
}