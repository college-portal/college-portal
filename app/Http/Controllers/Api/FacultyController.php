<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\FacultyService;
use App\Services\SchoolService;
use App\Filters\FacultyFilters;
use App\Http\Requests\FacultyRequest;
use App\Http\Resources\FacultyResource;

class FacultyController extends ApiController
{
    protected $service, $schoolService;

    public function __construct(FacultyService $service, SchoolService $schoolService) {
        $this->service = $service;
        $this->schoolService = $schoolService;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Faculty by ID
     * 
     * Responds with a specific Faculty by its ID
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_departments
     *   - ?with_programs
     *   - ?with_students
     *   - ?with_staff
     *   - ?with_users
     */
    public function show(Request $request, FacultyFilters $filters, int $id) {
        $faculty = $this->service()->repo()->faculty($id, $filters);
        $this->authorize('view', $faculty); /** ensure the current user has view rights */
        return $faculty;
    }

    /**
     * Get Faculties
     * 
     * Responds with a list of Faculties
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_departments
     *   - ?with_programs
     *   - ?with_students
     *   - ?with_staff
     *   - ?with_users
     */
    public function index(Request $request, FacultyFilters $filters) {
        $faculties = $this->service()->repo()->faculties($request->user(), $filters);
        return $faculties;
    }

    /**
     * Delete Faculty
     * 
     * Removes a Faculty from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Faculty belongs to or
     *  - User is Dean of the Faculty
     */
    public function destroy(Request $request, int $id) {
        $faculty = $this->service()->repo()->faculty($id);
        $this->authorize('delete', $faculty); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Faculty
     * 
     * Supply Faculty information to create a new one
     * - Rules of Access
     *  - User is an administrator or 
     *  - User owns school the Faculty belongs to
     */
    public function store(FacultyRequest $request) {
        $faculty = $this->service()->repo()->create($request->all());
        return $this->created($faculty);
    }

    /**
     * Update Faculty
     * 
     * Modify information about an existing Faculty by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Faculty belongs to or
     *  - User is Dean of the Faculty
     */
    public function update(Request $request, int $id) {
        $faculty = $this->service()->repo()->faculty($id);
        $this->authorize('update', $faculty);
        $faculty = $this->service()->repo()->update($id, $request->all());
        return $this->json($faculty);
    }
}
