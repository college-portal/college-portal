<?php

namespace App\Repositories;

use App\User;
use App\Models\StudentTakesCourse;
use App\Filters\StudentTakesCourseFilters;
use Carbon\Carbon;

class StudentTakesCourseRepository
{
    public function model()
    {
        return app(StudentTakesCourse::class);
    }

    public function list(User $user, StudentTakesCourseFilters $filters) {
        return $this->model()->filter($filters)->paginate();
    }

    public function single($id, StudentTakesCourseFilters $filters = null) {
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

    public function count(StudentTakesCourseFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}