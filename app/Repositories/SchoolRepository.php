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
        $items = $user->schools()->filter($filters)->paginate();
        $items->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
        return $items;
    }

    public function school(User $user, $id, SchoolFilters $filters = null) {
        $q = $user->schools();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $filters ? $filters->transform($q->findOrFail($id)) : $q->findOrFail($id);
    }

    public function delete(User $user, $id) {
        return $user->schools()->findOrFail($id)->delete();
    }

    public function create(User $user, $opts) {
        return $this->model()->create(array_merge($opts, [ 'owner_id' => $user->id ]));
    }

    public function update(User $user, $id, $opts = []) {
        $this->model()->where('id', $id)->update($opts);
        return $this->school($user, $id);
    }

    public function count()
    {
        return $this->model()->select('id', DB::raw('count(*) as total'))->count();
    }
}