<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\StaffTeachCourseService;
use App\Filters\StaffTeachCourseFilters;
use App\Http\Requests\StaffTeachCourseRequest;

class StaffTeachCourseController extends ApiController
{
    protected $service;

    public function __construct(StaffTeachCourseService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Staff-Teach-Course Info by ID
     * 
     * Responds with a specific Staff-Teach-Course by its ID
     * - Rules of Access
     *   - User is same school
     */
    public function show(Request $request, StaffTeachCourseFilters $filters, $id) {
        $staffCourse = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $staffCourse); /** ensure the current user has view rights */
        return $staffCourse;
    }

    /**
     * Get Staff-Teach-Course List
     * 
     * Responds with a list of Staff-Teach-Course info
     * - Rules of Access
     *   - User is same school
     */
    public function index(Request $request, StaffTeachCourseFilters $filters) {
        $staffCourses = $this->service()->repo()->list($request->user(), $filters);
        return $staffCourses;
    }

    /**
     * Delete Staff-Teach-Course
     * 
     * Removes a Staff-Teach-Course entry from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school or
     *  - User is a Dean in faculty or
     *  - User is an HOD in department
     */
    public function destroy(Request $request, $id) {
        $staffCourse = $this->service()->repo()->single($id);
        $this->authorize('delete', $staffCourse); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Staff-Teach-Course
     * 
     * Supply Staff-Teach-Course information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User is a SCHOOL_OWNER or DEAN of HOD in staff-teach-course's school and
     *  - User can update course
     */
    public function store(StaffTeachCourseRequest $request) {
        $staffTeachCourse = $this->service()->create($request->all());
        return $this->created($staffTeachCourse);
    }

    /**
     * Update Staff-Teach-Course
     * 
     * Modify information about an existing Staff-Teach-Course by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school or
     *  - User is a Dean in faculty or
     *  - User is an HOD in department
     */
    public function update(Request $request, $id) {
        $staffTeachCourse = $this->service()->repo()->single($id);
        $this->authorize('update', $staffTeachCourse);
        $staffTeachCourse = $this->service()->repo()->update($id, $request->all());
        return $this->json($staffTeachCourse);
    }
}
