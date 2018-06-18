<?php

namespace App\Repositories;

use App\Models\School;
use Carbon\Carbon;

class SchoolRepository
{
    public function model()
    {
        return app(School::class);
    }

    public function count()
    {
        return $this->model()->select('id', DB::raw('count(*) as total'))->count();
    }
}