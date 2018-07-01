<?php

namespace App\Services;

use App\Repositories\GradeRepository;
use Carbon\Carbon;

class GradeService
{
    public function repo()
    {
        return app(GradeRepository::class);
    }
}