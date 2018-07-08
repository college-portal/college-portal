<?php

namespace App\Repositories;

use App\User;
use App\Models\Department;
use App\Filters\DepartmentFilters;
use Carbon\Carbon;

class DepartmentRepository
{
    public function model()
    {
        return app(Department::class);
    }

    public function departments(User $user, DepartmentFilters $filters) {
        return $user->departments()->filter($filters)->paginate()->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
    }

    public function department($id, DepartmentFilters $filters = null) {
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
        return $this->department($id);
    }

    public function count()
    {
        return $this->model()->select('id', DB::raw('count(*) as total'))->count();
    }
}