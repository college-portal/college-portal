<?php

namespace App\Services;

use App\Repositories\FacultyRepository;
use Carbon\Carbon;

class FacultyService extends BaseService
{
    public function repo()
    {
        return app(FacultyRepository::class);
    }
}