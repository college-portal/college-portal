<?php

namespace App\Repositories;

use App\User;
use App\Models\Staff;
use App\Filters\StaffFilters;
use Carbon\Carbon;

class StaffRepository
{
    public function model()
    {
        return app(Staff::class);
    }

    public function list(User $user, StaffFilters $filters) {
        return $user->viewableStaff()->filter($filters)->paginate()->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
    }

    public function single($id, StaffFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $filters->transform($q->findOrFail($id));
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

    public function count(StaffFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}