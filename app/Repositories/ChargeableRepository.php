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
        return $this->model()->where('id', $id)->delete();
    }

    public function create($opts) {
        return $this->model()->create($opts);
    }

    public function update($id, $opts = []) {
        $item = $this->model()->findOrFail($id);
        $item->fill($opts);
        $item->save();
        return $item;
    }

    public function count(ChargeableFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}