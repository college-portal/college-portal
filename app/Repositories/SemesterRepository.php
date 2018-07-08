<?php

namespace App\Repositories;

use App\User;
use App\Models\Semester;
use App\Filters\SemesterFilters;
use Carbon\Carbon;

class SemesterRepository
{
    public function model()
    {
        return app(Semester::class);
    }

    public function semesters(User $user, SemesterFilters $filters) {
        return $user->semesters()->filter($filters)->paginate()->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
    }

    public function semester($id, SemesterFilters $filters = null) {
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
        return $this->semester($id);
    }

    public function count(SemesterFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}