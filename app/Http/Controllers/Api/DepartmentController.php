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
     * 
     * Responds with a specific Department by its ID
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_faculty
     *   - ?with_hod
     *   - ?with_programs
     *   - ?with_staff
     *   - ?with_students
     */
    public function show(Request $request, DepartmentFilters $filters, int $id) {
        $department = $this->service()->repo()->department($id, $filters);
        $this->authorize('view', $department); /** ensure the current user has view rights */
        return $department;
    }

    /**
     * Get Departments
     * 
     * Responds with a list of Departments
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_faculty
     *   - ?with_hod
     *   - ?with_programs
     *   - ?with_staff
     *   - ?with_students
     */
    public function index(Request $request, DepartmentFilters $filters) {
        $departments = $this->service()->repo()->departments($request->user(), $filters);
        return $departments;
    }

    /**
     * Delete Department
     * 
     * Removes a Department from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Department belongs to or
     *  - User is Dean of Faculty the Department belongs to or
     *  - User is HOD of the Department
     */
    public function destroy(Request $request, int $id) {
        $department = $this->service()->repo()->department($id);
        $this->authorize('delete', $department); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Department
     * 
     * Supply Department information to create a new one
     * - Rules of Access
     *  - User is an administrator or 
     *  - User owns school the Department belongs to or
     *  - User is Dean of Faculty the Department belongs to
     */
    public function store(DepartmentRequest $request) {
        $department = $this->service()->repo()->create($request->all());
        return $this->created($department);
    }

    /**
     * Update Department
     * 
     * Modify information about an existing Department by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Department belongs to or
     *  - User is Dean of Faculty the Department belongs to or
     *  - User is HOD of the Department
     */
    public function update(Request $request, int $id) {
        $department = $this->service()->repo()->department($id);
        $this->authorize('update', $department);
        $department = $this->service()->repo()->update($id, $request->all());
        return $this->json($department);
    }
}
