<?php

namespace App\Repositories;

use App\User;
use App\Models\IntentType;
use App\Filters\IntentTypeFilters;
use Carbon\Carbon;

class IntentTypeRepository
{
    public function model()
    {
        return app(IntentType::class);
    }

    public function list(User $user, IntentTypeFilters $filters) {
        return $this->model()->filter($filters)->paginate();
    }

    public function single($id, IntentTypeFilters $filters = null) {
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

    public function count(IntentTypeFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}