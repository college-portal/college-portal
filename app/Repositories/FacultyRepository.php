<?php

namespace App\Repositories;

use App\Models\Faculty;
use App\Filters\FacultyFilters;
use App\User;
use Carbon\Carbon;

class FacultyRepository
{
    public function model()
    {
        return app(Faculty::class);
    }

    public function faculties(User $user, FacultyFilters $filters) {
        return $user->faculties()->filter($filters)->paginate();
    }

    public function faculty($id) {
        return $this->model()->findOrFail($id);
    }

    public function delete($id) {
        return $this->model()->where('id', $id)->delete();
    }

    public function create($opts) {
        return $this->model()->create($opts);
    }

    public function update($id, $opts = []) {
        $this->model()->where('id', $id)->update($opts);
        return $this->faculty($id);
    }

    public function count()
    {
        return $this->model()->select('id', DB::raw('count(*) as total'))->count();
    }
}