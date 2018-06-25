<?php

namespace App\Services;

use App\Repositories\LevelRepository;
use Carbon\Carbon;

class LevelService extends BaseService
{
    public function repo()
    {
        return app(LevelRepository::class);
    }
}