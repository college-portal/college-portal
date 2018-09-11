<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\GradeService;
use App\Filters\GradeFilters;
use App\Http\Requests\GradeRequest;

/**
 * @resource Grades
 *
 * For Endpoints handling Grades, which is a partial or total score a 
 *  lecturer assigns to a student who takes a course he/she is in charge of.
 */
class GradeController extends ApiController
{
    protected $service;

    public function __construct(GradeService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Grade by ID
     * 
     * Responds with a specific Grade by its ID
     * - Rules of Access
     *   - User can update grade student or
     *   - Grade belongs to current User
     * - Filters
     *   - ?with_student
     *   - ?with_staff
     *   - ?with_course
     *   - ?with_school
     *   - ?with_users
     *   - ?with_total
     */
    public function show(Request $request, GradeFilters $filters, $id) {
        $grade = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $grade); /** ensure the current user has view rights */
        return $grade;
    }

    /**
     * Get Grades
     * 
     * Responds with a list of Grades
     * - Rules of Access
     *   - User can update grade student or
     *   - Grade belongs to current User
     * - Filters
     *   - ?with_student
     *   - ?with_staff
     *   - ?with_course
     *   - ?with_school
     *   - ?with_users
     *   - ?with_total
     */
    public function index(Request $request, GradeFilters $filters) {
        $grades = $this->service()->repo()->list($request->user(), $filters);
        return $grades;
    }

    /**
     * Delete Grade
     * 
     * Removes a Grade from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User is the staff that taught the Course or
     *  - User is the school owner or
     *  - User is the Dean of the Faculty the Course belongs to
     *  - User is the HOD of the Department the Course belongs to
     */
    public function destroy(Request $request, $id) {
        $grade = $this->service()->repo()->single($id);
        $this->authorize('delete', $grade); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Grade
     * 
     * Supply Grade information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User is the staff that taught the Course or
     *  - User is the school owner or
     *  - User is the Dean of the Faculty the Course belongs to
     *  - User is the HOD of the Department the Course belongs to
     */
    public function store(GradeRequest $request) {
        $grade = $this->service()->create($request->all());
        return $this->created($grade);
    }

    /**
     * Update Grade
     * 
     * Modify information about an existing Grade by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User is the staff that taught the Course or
     *  - User is the school owner or
     *  - User is the Dean of the Faculty the Course belongs to
     *  - User is the HOD of the Department the Course belongs to
     */
    public function update(Request $request, $id) {
        $grade = $this->service()->repo()->single($id);
        $this->authorize('update', $grade);
        $grade = $this->service()->update($id, $request->all());
        return $this->json($grade);
    }
}
