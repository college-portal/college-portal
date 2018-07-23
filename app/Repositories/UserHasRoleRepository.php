<?php

namespace App\Repositories;

use App\User;
use App\Models\UserHasRole;
use App\Filters\UserHasRoleFilters;
use Carbon\Carbon;

class UserHasRoleRepository
{
    public function model()
    {
        return app(UserHasRole::class);
    }

    public function list(User $user, UserHasRoleFilters $filters) {
        return $this->model()->filter($filters)->paginate();
    }

    public function single($id, UserHasRoleFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $q->findOrFail($id);
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

    public function count(UserHasRoleFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}