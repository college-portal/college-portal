<?php

namespace App\Repositories;

use App\User;
use App\Filters\UserFilters;
use Carbon\Carbon;

class UserRepository
{
    public function model()
    {
        return app(User::class);
    }

    public function users(User $user, UserFilters $filters) {
        return $user->users()->paginate();
    }

    public function user($id, UserFilters $filters = null) {
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
        return $this->user($id);
    }

    public function count(UserFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}