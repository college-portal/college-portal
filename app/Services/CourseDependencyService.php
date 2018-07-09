<?php

namespace App\Services;

use App\Repositories\CourseDependencyRepository;
use App\Repositories\CourseRepository;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class CourseDependencyService
{
    private $courseRepository;

    public function __construct(CourseRepository $courseRepository) {
        $this->courseRepository = $courseRepository;
    }

    public function repo()
    {
        return app(CourseDependencyRepository::class);
    }

    public function update($id, $opts = []) {
        request()->validate([
            'course_id' => 'numeric|exists:courses,id',
            'dependency_id' => 'numeric|exists:courses,id'
        ]);

        $course_id = isset($opts['course_id']) ? $opts['course_id'] : null;
        $dependency_id = isset($opts['dependency_id']) ? $opts['dependency_id'] : null;

        if ($course_id && $dependency_id && ($course_id == $dependency_id)) {
            throw ValidationException::withMessages([
                'course_id' => 'must be different from dependency_id',
                'dependency_id' => 'must be different from course_id'
            ]);
        }

        $user = auth()->user()->first();
        if ($course_id) {
            $course = $this->courseRepository->course($course_id);
            $user->authorize('update', $course);
        }
        if ($dependency_id) {
            $dependency = $this->courseRepository->course($dependency_id);
            $user->authorize('update', $dependency);
        }

        $courseDependency = $this->repo()->single($id);
        $user->authorize('update', $courseDependency);

        return $this->repo()->update($id, $opts);
    }
}