<?php

namespace App\Repositories;

use App\User;
use App\Models\School;
use App\Filters\SchoolFilters;
use Carbon\Carbon;

class SchoolRepository
{
    public function model()
    {
        return app(School::class);
    }

    public function schools(User $user, SchoolFilters $filters) {
        return $user->schools()->filter($filters)->paginate();
    }

    public function school(User $user, $id, SchoolFilters $filters = null) {
        $q = $user->schools();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $q->findOrFail($id);
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
        $this->model()->where('id', $id)->update(array_merge([ 'is_active' => 1 ], $opts));
        return $this->school($user, $id);
    }

    public function count()
    {
        return $this->model()->select('id', DB::raw('count(*) as total'))->count();
    }
}