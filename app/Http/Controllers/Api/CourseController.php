<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Filters\CourseFilters;
use App\Http\Requests\CourseRequest;

class CourseController extends ApiController
{
    protected $service;

    public function __construct(CourseService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, CourseFilters $filters, int $id) {
        $course = $this->service()->repo()->course($id, $filters);
        $this->authorize('view', $course); /** ensure the current user has view rights */
        return $course;
    }

    public function index(Request $request, CourseFilters $filters) {
        $courses = $this->service()->repo()->courses($request->user(), $filters);
        return $courses;
    }

    public function destroy(Request $request, int $id) {
        $course = $this->service()->repo()->course($id);
        $this->authorize('delete', $course); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(CourseRequest $request) {
        $course = $this->service()->repo()->create($request->all());
        return $this->json($course);
    }

    public function update(Request $request, int $id) {
        $course = $this->service()->repo()->course($id);
        $this->authorize('update', $course);
        $course = $this->service()->repo()->update($id, $request->all());
        return $this->json($course);
    }
}
