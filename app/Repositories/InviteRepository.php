<?php

namespace App\Repositories;

use App\User;
use App\Models\Invite;
use App\Filters\InviteFilters;
use Carbon\Carbon;

class InviteRepository
{
    public function model()
    {
        return app(Invite::class);
    }

    public function list(User $user, InviteFilters $filters) {
        return $this->model()->filter($filters)->paginate();
    }

    public function single($id, InviteFilters $filters = null) {
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

    public function count(InviteFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}