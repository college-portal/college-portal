<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SemesterService;
use App\Filters\SemesterFilters;
use App\Http\Requests\SemesterRequest;

/**
 * @resource Semesters
 *
 * For Endpoints handling Semesters, which represent a time period, 
 *  marked by start and end dates, within a Session, and belonging 
 *  to a Semester Type.
 */
class SemesterController extends ApiController
{
    protected $service;

    public function __construct(SemesterService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Semester by ID
     * 
     * Responds with a specific Semester by its ID
     * - Rules of Access
     *   - User is same school as Semester
     * - Filters
     *   - ?with_session
     *   - ?with_type
     */
    public function show(Request $request, SemesterFilters $filters, int $id) {
        $semester = $this->service()->repo()->semester($id, $filters);
        $this->authorize('view', $semester);
        return $semester;
    }

    /**
     * Get Semesters
     * 
     * Responds with a list Semesters
     * - Rules of Access
     *   - User is same school as Semester
     * - Filters
     *   - ?with_session
     *   - ?with_type
     */
    public function index(Request $request, SemesterFilters $filters) {
        $semesters = $this->service()->repo()->semesters($request->user(), $filters);
        return $semesters;
    }

    /**
     * Delete Semester
     * 
     * Removes a Semester from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Semester belongs to
     */
    public function destroy(Request $request, int $id) {
        $semester = $this->service()->repo()->semester($id);
        $this->authorize('delete', $semester); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Semester
     * 
     * Supply Semester information to create a new one
     * - Rules of Access
     *  - User can update semester type
     */
    public function store(SemesterRequest $request) {
        $semester = $this->service()->create($request->all());
        return $this->created($semester);
    }

    /**
     * Update Semester
     * 
     * Modify information about an existing Semester by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Semester belongs to
     */
    public function update(Request $request, int $id) {
        $semester = $this->service()->repo()->semester($id);
        $this->authorize('update', $semester);
        $semester = $this->service()->update($id, $request->all());
        return $this->json($semester);
    }
}
