<?php

namespace App\Repositories;

use App\User;
use App\Models\Chargeable;
use App\Filters\ChargeableFilters;
use Carbon\Carbon;

class ChargeableRepository
{
    public function model()
    {
        return app(Chargeable::class);
    }

    public function list(User $user, ChargeableFilters $filters) {
        return $user->chargeables()->filter($filters)->paginate()->transform(function ($chargeable) use ($filters) {
            return $filters->transform($chargeable);
        });
    }

    public function single($id, ChargeableFilters $filters = null) {
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

    public function count(ChargeableFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}