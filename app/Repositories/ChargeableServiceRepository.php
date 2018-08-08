<?php

namespace App\Repositories;

use App\User;
use App\Models\ChargeableService;
use App\Filters\ChargeableServiceFilters;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function count(ChargeableServiceFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}