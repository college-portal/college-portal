<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Filters\StudentFilters;
use App\Http\Requests\StudentRequest;

class StudentController extends ApiController
{
    protected $service;

    public function __construct(StudentService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, StudentFilters $filters, int $id) {
        $student = $this->service()->repo()->student($id, $filters);
        $this->authorize('view', $student); /** ensure the current user has view rights */
        return $student;
    }

    public function index(Request $request, StudentFilters $filters) {
        $students = $this->service()->repo()->students($request->user(), $filters);
        return $students;
    }

    public function destroy(Request $request, int $id) {
        $student = $this->service()->repo()->student($id);
        $this->authorize('delete', $student); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(StudentRequest $request) {
        $student = $this->service()->repo()->create($request->all());
        return $this->json($student);
    }

    public function update(Request $request, int $id) {
        $student = $this->service()->repo()->student($id);
        $this->authorize('update', $student);
        $student = $this->service()->repo()->update($id, $request->all());
        return $this->json($student);
    }
}
