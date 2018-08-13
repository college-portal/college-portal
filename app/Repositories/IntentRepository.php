<?php

namespace App\Repositories;

use CollegePortal\Models\User;
use CollegePortal\Models\Intent;
use App\Filters\IntentFilters;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IntentRepository
{
    public function model()
    {
        return app(Intent::class);
    }

    public function list(User $user, IntentFilters $filters) {
        return $this->model()->filter($filters)->paginate();
    }

    public function single($id, IntentFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $q->findOrFail($id);
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

    public function count(IntentFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}