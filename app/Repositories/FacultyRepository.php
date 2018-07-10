<?php

namespace App\Repositories;

use App\Models\Faculty;
use App\Filters\FacultyFilters;
use App\User;
use Carbon\Carbon;

class FacultyRepository
{
    public function model()
    {
        return app(Faculty::class);
    }

    public function faculties(User $user, FacultyFilters $filters) {
        $items = $user->faculties()->filter($filters)->paginate();
        $items->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
        return $items;
    }

    public function faculty($id, FacultyFilters $filters = null) {
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
        return $this->faculty($id);
    }

    public function count()
    {
        return $this->model()->select('id', DB::raw('count(*) as total'))->count();
    }
}