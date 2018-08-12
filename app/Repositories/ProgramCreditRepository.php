<?php

namespace App\Repositories;

use CollegePortal\Models\User;
use CollegePortal\Models\ProgramCredit;
use App\Filters\ProgramCreditFilters;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProgramCreditRepository
{
    public function model()
    {
        return app(ProgramCredit::class);
    }

    public function list(User $user, ProgramCreditFilters $filters) {
        $items = $user->programCredits()->filter($filters)->paginate();
        $items->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
        return $items;
    }

    public function single($id, ProgramCreditFilters $filters = null) {
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

    public function count(ProgramCreditFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}