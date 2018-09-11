<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Filters\CourseFilters;
use App\Http\Requests\CourseRequest;

/**
 * @resource Courses
 *
 * For Endpoints handling Courses, which represent a subject, managed by a department,
 *  that students can subscribe to, learn and receive Grades for having learnt.
 */
class CourseController extends ApiController
{
    protected $service;

    public function __construct(CourseService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Course by ID
     * 
     * Responds with a specific course by its ID
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_dependencies
     *   - ?with_staff
     *   - ?with_department
     *   - ?with_semester_type
     *   - ?with_level
     *   - ?with_school
     *   - ?with_faculty
     */
    public function show(Request $request, CourseFilters $filters, int $id) {
        $course = $this->service()->repo()->course($id, $filters);
        $this->authorize('view', $course); /** ensure the current user has view rights */
        return $course;
    }

    /**
     * Get Courses
     * 
     * Responds with a list of Courses
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_dependencies
     *   - ?with_staff
     *   - ?with_department
     *   - ?with_semester_type
     *   - ?with_level
     *   - ?with_school
     *   - ?with_faculty
     */
    public function index(Request $request, CourseFilters $filters) {
        $courses = $this->service()->repo()->courses($request->user(), $filters);
        return $courses;
    }

    /**
     * Delete Course
     * 
     * Removes a Course from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Course belongs to or
     *  - User is Dean of Faculty the Course belongs to or
     *  - User is HOD of Department the Course belongs to
     */
    public function destroy(Request $request, int $id) {
        $course = $this->service()->repo()->course($id);
        $this->authorize('delete', $course); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Course
     * 
     * Supply Course information to create a new one
     * - Rules of Access
     *  - User can view course's department, level, semester_type and
     *  - User is an administrator or 
     *  - User owns school the Course belongs to or
     *  - User is Dean of Faculty the Course belongs to or
     *  - User is HOD of Department the Course belongs to
     */
    public function store(CourseRequest $request) {
        $course = $this->service()->repo()->create($request->all());
        return $this->created($course);
    }

    /**
     * Update Course
     * 
     * Modify information about an existing Course by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Course belongs to
     */
    public function update(Request $request, int $id) {
        $course = $this->service()->repo()->course($id);
        $this->authorize('update', $course);
        $course = $this->service()->repo()->update($id, $request->all());
        return $this->json($course);
    }
}
