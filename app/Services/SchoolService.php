<?php

namespace App\Services;

use App\User;
use App\Filters\SchoolFilters;
use App\Repositories\SchoolRepository;
use Carbon\Carbon;

class SchoolService
{
    public function repo()
    {
        return app(SchoolRepository::class);
    }

    public function schools(User $user, SchoolFilters $filters) {
        return $user->schools()->filter($filters)->paginate();
    }

    public function school(User $user, $id) {
        return $user->schools()->findOrFail($id);
    }
}