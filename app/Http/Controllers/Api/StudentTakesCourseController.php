<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\StudentTakesCourseService;
use App\Filters\StudentTakesCourseFilters;
use App\Http\Requests\StudentTakesCourseRequest;

class StudentTakesCourseController extends ApiController
{
    protected $service;

    public function __construct(StudentTakesCourseService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, StudentTakesCourseFilters $filters, $id) {
        $studentCourse = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $studentCourse); /** ensure the current user has view rights */
        return $studentCourse;
    }

    public function index(Request $request, StudentTakesCourseFilters $filters) {
        $studentCourse = $this->service()->repo()->list($request->user(), $filters);
        return $studentCourse;
    }

    public function destroy(Request $request, $id) {
        $studentCourse = $this->service()->repo()->single($id);
        $this->authorize('delete', $studentCourse); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(StudentTakesCourseRequest $request) {
        $studentCourse = $this->service()->create($request->all());
        return $this->json($studentCourse);
    }

    public function update(Request $request, $id) {
        $studentCourse = $this->service()->repo()->single($id);
        $this->authorize('update', $studentCourse);
        $studentCourse = $this->service()->update($id, $request->all());
        return $this->json($studentCourse);
    }
}
