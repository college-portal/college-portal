<?php

namespace App\Services;

use App\Repositories\ProgramRepository;
use Carbon\Carbon;

class ProgramService
{
    public function repo()
    {
        return app(ProgramRepository::class);
    }
}