<?php

namespace App\Repositories;

use App\User;
use App\Models\Student;
use App\Filters\StudentFilters;
use Carbon\Carbon;

class StudentRepository
{
    public function model()
    {
        return app(Student::class);
    }

    public function students(User $user, StudentFilters $filters) {
        $items = $user->viewableStudents()->filter($filters)->paginate();
        $items->transform(function ($item) use ($filters) {
            return $filters->transform($item);
        });
        return $items;
    }

    public function student($id, StudentFilters $filters = null) {
        $q = $this->model();
        if ($filters) {
            $q = $q->filter($filters);
        }
        return $filters ? $filters->transform($q->findOrFail($id)) : $q->findOrFail($id);
    }

    public function delete($id) {
        $single = $this->model()->where('id', $id)->first();
        return $single->delete();
    }

    public function create($opts) {
        return $this->model()->create(array_merge($opts, [ 'is_active' => true ]));
    }

    public function update($id, $opts = []) {
        $this->model()->where('id', $id)->update($opts);
        return $this->student($id);
    }

    public function count(StudentFilters $filters)
    {
        return $this->model()->filter($filters)->select('id', DB::raw('count(*) as total'))->count();
    }
}