<?php

namespace App\Repositories;

use CollegePortal\Models\User;
use CollegePortal\Models\Chargeable;
use App\Filters\ChargeableFilters;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChargeableRepository
{
    public function model()
    {
        return app(Chargeable::class);
    }

    public function list(User $user, ChargeableFilters $filters) {
        $items = $user->chargeables()->filter($filters)->paginate();
        $items->transform(function ($chargeable) use ($filters) {
            return $filters->transform($chargeable);
        });
        return $items;
    }

    public function single($id, ChargeableFilters $filters = null) {
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

    public function count(ChargeableFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}