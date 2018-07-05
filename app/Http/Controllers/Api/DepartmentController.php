<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Services\DepartmentService;
use App\Services\FacultyService;
use App\Filters\DepartmentFilters;

class DepartmentController extends ApiController
{
    protected $service, $facultyService;

    public function __construct(DepartmentService $service, FacultyService $facultyService) {
        $this->service = $service;
        $this->facultyService = $facultyService;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Department by ID
     */
    public function show(Request $request, DepartmentFilters $filters, int $id) {
        $department = $this->service()->repo()->department($id, $filters);
        $this->authorize('view', $department); /** ensure the current user has view rights */
        return $department;
    }

    /**
     * Get Departments
     */
    public function index(Request $request, DepartmentFilters $filters) {
        $departments = $this->service()->repo()->departments($request->user(), $filters);
        return $departments;
    }

    /**
     * Delete Department
     */
    public function destroy(Request $request, int $id) {
        $department = $this->service()->repo()->department($id);
        $this->authorize('delete', $department); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Department
     */
    public function store(DepartmentRequest $request) {
        $department = $this->service()->repo()->create($request->all());
        return $this->json($department);
    }

    /**
     * Update Department
     */
    public function update(Request $request, int $id) {
        $department = $this->service()->repo()->department($id);
        $this->authorize('update', $department);
        $department = $this->service()->repo()->update($id, $request->all());
        return $this->json($department);
    }
}
