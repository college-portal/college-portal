<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\StudentService;
use App\Filters\StudentFilters;
use App\Http\Requests\StudentRequest;

/**
 * @resource Students
 *
 * For Endpoints handling Students, which represent a user with 
 *  a "student" role within a School
 */
class StudentController extends ApiController
{
    protected $service;

    public function __construct(StudentService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Student by ID
     * 
     * Responds with a specific Student by its ID
     * - Rules of Access
     *   - User is same school as Student
     * - Filters
     *   - ?program={id}
     *   - ?matric={no}
     *   - ?with_user
     *   - ?with_program
     */
    public function show(Request $request, StudentFilters $filters, int $id) {
        $student = $this->service()->repo()->student($id, $filters);
        $this->authorize('view', $student); /** ensure the current user has view rights */
        return $student;
    }

    /**
     * Get Students
     * 
     * Responds with a list of Students
     * - Rules of Access
     *   - User is same school as Student
     * - Filters
     *   - ?program={id}
     *   - ?matric={no}
     *   - ?with_user
     *   - ?with_program
     */
    public function index(Request $request, StudentFilters $filters) {
        $students = $this->service()->repo()->students($request->user(), $filters);
        return $students;
    }

    /**
     * Delete Student
     * 
     * Removes a Student from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Student belongs to or
     *  - User is HOD in Student's department or
     *  - User is Dean of Student's Faculty
     */
    public function destroy(Request $request, int $id) {
        $student = $this->service()->repo()->student($id);
        $this->authorize('delete', $student); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Student
     * 
     * Supply Student information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Student belongs to or
     *  - User is HOD in Student's department or
     *  - User is Dean of Student's Faculty
     */
    public function store(StudentRequest $request) {
        $student = $this->service()->repo()->create($request->all());
        return $this->created($student);
    }

    /**
     * Update Student
     * 
     * Modify information about an existing Student by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Student belongs to or
     *  - User is HOD in Student's department or
     *  - User is Dean of Student's Faculty
     */
    public function update(Request $request, int $id) {
        $student = $this->service()->repo()->student($id);
        $this->authorize('update', $student);
        $student = $this->service()->repo()->update($id, $request->all());
        return $this->json($student);
    }
}
