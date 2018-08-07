<?php

namespace App\Repositories;

use App\User;
use App\Models\Prospect;
use App\Filters\ProspectFilters;
use Carbon\Carbon;

class ProspectRepository
{
    public function model()
    {
        return app(Prospect::class);
    }

    public function list(User $user, ProspectFilters $filters) {
        return $this->model()->filter($filters)->paginate();
    }

    public function single($id, ProspectFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $filters ? $filters->transform($q->findOrFail($id)) : $q->findOrFail($id);;
    }

    public function delete($id) {
        return $this->model()->findOrFail($id)->delete();
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

    public function count(ProspectFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}