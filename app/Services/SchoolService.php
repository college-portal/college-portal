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

    public function delete(User $user, $id) {
        return $user->schools()->where('id', $id)->update([
            'is_active' => false
        ]);
    }

    public function create(User $user, $opts) {
        return $user->schools()->create(array_merge([ 'is_active' => 1 ], $opts));
    }

    public function update(User $user, $id, $opts = []) {
        $user->schools()->where('id', $id)->update(array_merge([ 'is_active' => 1 ], $opts));
        return $this->school($user, $id);
    }
}