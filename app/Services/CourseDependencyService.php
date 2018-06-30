<?php

namespace App\Services;

use App\Repositories\CourseDependencyRepository;
use Carbon\Carbon;

class CourseDependencyService
{
    public function repo()
    {
        return app(CourseDependencyRepository::class);
    }

    public function update($id, $opts = []) {
        request()->validate([
            'course_id' => 'numeric|exists:courses,id|different:dependency_id',
            'dependency_id' => 'numeric|exists:courses,id|different:course_id'
        ]);
        $user = auth()->user()->first();
        $dependency = $this->repo()->single($id);
        $user->authorize('update', $dependency);
        return $this->repo()->update($id, $opts);
    }
}