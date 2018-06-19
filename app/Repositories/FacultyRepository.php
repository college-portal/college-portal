<?php

namespace App\Repositories;

use App\Models\Faculty;
use Carbon\Carbon;

class FacultyRepository
{
    public function model()
    {
        return app(Faculty::class);
    }

    public function count()
    {
        return $this->model()->select('id', DB::raw('count(*) as total'))->count();
    }
}