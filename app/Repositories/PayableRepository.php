<?php

namespace App\Repositories;

use App\User;
use App\Models\Payable;
use App\Filters\PayableFilters;
use Carbon\Carbon;

class PayableRepository
{
    public function model()
    {
        return app(Payable::class);
    }

    public function list(User $user, PayableFilters $filters) {
        $items = $user->viewablePayables()->filter($filters)->paginate();
        $items->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
        return $items;
    }

    public function single($id, PayableFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $filters ? $filters->transform($q->findOrFail($id)) : $q->findOrFail($id);
    }

    public function delete($id) {
        return $this->model()->findOrFail($id)->delete();
    }

    public function create($opts) {
        return $this->model()->create($opts);
    }

    public function update($id, $opts = []) {
        $payable = $this->model()->findOrFail($id);
        if (isset($opts['is_paid'])) $payable->is_paid = $opts['is_paid'];
        $payable->save();
        return $payable;
    }

    public function count(PayableFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}