<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProgramService;
use App\Filters\ProgramFilters;
use App\Http\Requests\ProgramRequest;

class ProgramController extends ApiController
{
    protected $service;

    public function __construct(ProgramService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Program by ID
     * 
     * Responds with a specific Program by its ID
     * - Rules of Access
     *   - User is same school as program
     * - Filters
     *   - ?with_departments
     */
    public function show(Request $request, ProgramFilters $filters, int $id) {
        $program = $this->service()->repo()->program($id, $filters);
        $this->authorize('view', $program); /** ensure the current user has view rights */
        return $program;
    }

    /**
     * Get Programs
     * 
     * Responds with a list of Programs
     * - Rules of Access
     *   - User is same school as program
     * - Filters
     *   - ?with_departments
     */
    public function index(Request $request, ProgramFilters $filters) {
        $programs = $this->service()->repo()->programs($request->user(), $filters);
        return $programs;
    }

    /**
     * Delete Program
     * 
     * Removes a Program from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Program belongs to
     *  - User is Dean of Program's faculty
     *  - User is HOD of Program's department
     */
    public function destroy(Request $request, int $id) {
        $program = $this->service()->repo()->program($id);
        $this->authorize('delete', $program); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Program
     * 
     * Supply Program information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Program belongs to
     *  - User is Dean of Program's faculty
     *  - User is HOD of Program's department
     */
    public function store(ProgramRequest $request) {
        $program = $this->service()->repo()->create($request->all());
        return $this->json($program);
    }

    /**
     * Update Program
     * 
     * Modify information about an existing Program by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Program belongs to
     *  - User is Dean of Program's faculty
     *  - User is HOD of Program's department
     */
    public function update(Request $request, int $id) {
        $program = $this->service()->repo()->program($id);
        $this->authorize('update', $program);
        $program = $this->service()->repo()->update($id, $request->all());
        return $this->json($program);
    }
}
