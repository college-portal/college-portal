<?php

namespace App\Repositories;

use App\User;
use App\Models\ChargeableService;
use App\Filters\ChargeableServiceFilters;
use Carbon\Carbon;

class ChargeableServiceRepository
{
    public function model()
    {
        return app(ChargeableService::class);
    }

    public function list(User $user, ChargeableServiceFilters $filters) {
        $items = $user->chargeableServices()->filter($filters)->paginate();
        $items->transform(function ($service) use ($filters) {
            return $filters->transform($service);
        });
        return $items;
    }

    public function single($id, ChargeableServiceFilters $filters = null) {
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
        return $this->single($id);
    }

    public function count(ChargeableServiceFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}