<?php

namespace App\Repositories;

use App\User;
use App\Models\Level;
use App\Filters\LevelFilters;
use Carbon\Carbon;

class LevelRepository
{
    public function model()
    {
        return app(Level::class);
    }

    public function levels(User $user, LevelFilters $filters) {
        return $this->model()->filter($filters)->paginate();
    }

    public function level($id, LevelFilters $filters = null) {
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
        return $this->level($id);
    }

    public function count(LevelFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}