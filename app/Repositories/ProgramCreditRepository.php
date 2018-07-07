<?php

namespace App\Repositories;

use App\User;
use App\Models\ProgramCredit;
use App\Filters\ProgramCreditFilters;
use Carbon\Carbon;

class ProgramCreditRepository
{
    public function model()
    {
        return app(ProgramCredit::class);
    }

    public function list(User $user, ProgramCreditFilters $filters) {
        return $user->programCredits()->filter($filters)->paginate()->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
    }

    public function single($id, ProgramCreditFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $filters->transform($q->findOrFail($id));
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

    public function count(ProgramCreditFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}