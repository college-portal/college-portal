<?php

namespace App\Repositories;

use CollegePortal\Models\User;
use CollegePortal\Models\Semester;
use App\Filters\SemesterFilters;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SemesterRepository
{
    public function model()
    {
        return app(Semester::class);
    }

    public function semesters(User $user, SemesterFilters $filters) {
        $items = $user->semesters()->filter($filters)->paginate();
        $items->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
        return $items;
    }

    public function semester($id, SemesterFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $filters ? $filters->transform($q->findOrFail($id)) : $q->findOrFail($id);
    }

    public function delete($id) {
        return DB::transaction(function () use ($id) {
            return $this->model()->findOrFail($id)->delete();
        });
    }

    public function create($opts) {
        return DB::transaction(function () use ($opts) {
            return $this->model()->create($opts);
        });
    }

    public function update($id, $opts = []) {
        return DB::transaction(function () use ($id, $opts) {
            $item = $this->model()->findOrFail($id);
            $item->fill($opts);
            $item->save();
            return $item;
        });
    }

    public function count(SemesterFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}