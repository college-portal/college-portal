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

    /**
     * Get Student-Takes-Course by ID
     * 
     * Responds with a specific Student-Takes-Course by its ID
     * - Rules of Access
     *   - User is same school
     * - Filters
     *   - ?with_student
     *   - ?with_staff_courses
     *   - ?with_semester
     *   - ?with_staff
     *   - ?with_course
     *   - ?with_school
     */
    public function show(Request $request, StudentTakesCourseFilters $filters, $id) {
        $studentCourse = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $studentCourse); /** ensure the current user has view rights */
        return $studentCourse;
    }

    /**
     * Get Student-Takes-Course List
     * 
     * Responds with a list of Student-Takes-Course info
     * - Rules of Access
     *   - User is same school
     * - Filters
     *   - ?with_student
     *   - ?with_staff_courses
     *   - ?with_semester
     *   - ?with_staff
     *   - ?with_course
     *   - ?with_school
     */
    public function index(Request $request, StudentTakesCourseFilters $filters) {
        $studentCourse = $this->service()->repo()->list($request->user(), $filters);
        return $studentCourse;
    }

    /**
     * Delete Student-Takes-Course
     * 
     * Removes a Student-Takes-Course entry from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school or
     *  - User is a Dean in faculty or
     *  - User is an HOD in department
     */
    public function destroy(Request $request, $id) {
        $studentCourse = $this->service()->repo()->single($id);
        $this->authorize('delete', $studentCourse); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Student-Takes-Course
     * 
     * Supply Student-Takes-Course information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User is a SCHOOL_OWNER or DEAN of HOD in school and or
     *  - User is student
     */
    public function store(StudentTakesCourseRequest $request) {
        $studentCourse = $this->service()->create($request->all());
        return $this->json($studentCourse);
    }

    /**
     * Update Student-Takes-Course
     * 
     * Modify information about an existing Student-Takes-Course by ID
     * - Rules of Access
     *  - Student, Staff, Course and Semester are in the same school and
     *  - User is an ADMIN or
     *  - User owns school or
     *  - User is a Dean in faculty or
     *  - User is an HOD in department
     */
    public function update(Request $request, $id) {
        $studentCourse = $this->service()->repo()->single($id);
        $this->authorize('update', $studentCourse);
        $studentCourse = $this->service()->update($id, $request->all());
        return $this->json($studentCourse);
    }
}
