<?php

namespace App\Services;

use App\Repositories\IntentTypeRepository;
use Carbon\Carbon;

class IntentTypeService
{
    public function repo()
    {
        return app(IntentTypeRepository::class);
    }
}