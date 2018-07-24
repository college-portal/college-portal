<?php

namespace App\Repositories;

use App\User;
use App\Models\Content;
use App\Filters\ContentFilters;
use Carbon\Carbon;

class ContentRepository
{
    public function model()
    {
        return app(Content::class);
    }

    public function list(User $user, ContentFilters $filters) {
        return $this->model()->filter($filters)->paginate();
    }

    public function single($id, ContentFilters $filters = null) {
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

    public function count(ContentFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}