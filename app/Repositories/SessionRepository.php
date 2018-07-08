<?php

namespace App\Repositories;

use App\User;
use App\Models\Session;
use App\Filters\SessionFilters;
use Carbon\Carbon;

class SessionRepository
{
    public function model()
    {
        return app(Session::class);
    }

    public function sessions(User $user, SessionFilters $filters) {
        return $user->sessions()->filter($filters)->paginate()->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
    }

    public function session($id, SessionFilters $filters = null) {
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
        return $this->session($id);
    }

    public function count(SessionFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}