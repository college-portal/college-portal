<?php

namespace App\Repositories;

use App\User;
use App\Models\ContentType;
use App\Filters\ContentTypeFilters;
use Carbon\Carbon;

class ContentTypeRepository
{
    public function model()
    {
        return app(ContentType::class);
    }

    public function list(User $user, ContentTypeFilters $filters) {
        return $this->model()->filter($filters)->paginate();
    }

    public function single($id, ContentTypeFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $q->findOrFail($id);
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

    public function count(ContentTypeFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}