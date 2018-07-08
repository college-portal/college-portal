<?php

namespace App\Repositories;

use App\User;
use App\Models\CourseDependency;
use App\Filters\CourseDependencyFilters;
use Carbon\Carbon;

class CourseDependencyRepository
{
    public function model()
    {
        return app(CourseDependency::class);
    }

    public function list(User $user, CourseDependencyFilters $filters) {
        return $user->courseDependencies()->filter($filters)->paginate()->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
    }

    public function single($id, CourseDependencyFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $filters ? $filters->transform($q->findOrFail($id)) : $q->findOrFail($id);
    }

    public function delete($id) {
        return $this->model()->where('id', $id)->delete();
    }

    public function create($opts) {
        return $this->model()->create($opts);
    }

    public function update($id, $opts = []) {
        $this->model()->where('id', $id)->update($opts);
        return $this->single($id);
    }

    public function count(CourseDependencyFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}