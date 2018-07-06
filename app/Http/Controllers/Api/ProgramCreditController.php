<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProgramCreditService;
use App\Filters\ProgramCreditFilters;
use App\Http\Requests\ProgramCreditRequest;

class ProgramCreditController extends ApiController
{
    protected $service;

    public function __construct(ProgramCreditService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Program Credit by ID
     * 
     * Responds with a specific Program Credit by its ID
     * - Rules of Access
     *   - User is same school
     */
    public function show(Request $request, ProgramCreditFilters $filters, int $id) {
        $credit = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $credit); /** ensure the current user has view rights */
        return $credit;
    }

    /**
     * Get Program Credits
     * 
     * Responds with a list of Program Credits
     * - Rules of Access
     *   - User is same school
     */
    public function index(Request $request, ProgramCreditFilters $filters) {
        $credits = $this->service()->repo()->list($request->user(), $filters);
        return $credits;
    }

    /**
     * Delete Program Credit
     * 
     * Removes a Program Credut from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Program Credit belongs to
     *  - User is Dean of Program Credit's faculty
     *  - User is HOD of Program Credit's department
     */
    public function destroy(Request $request, int $id) {
        $credit = $this->service()->repo()->single($id);
        $this->authorize('delete', $credit); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Program Credit
     * 
     * Supply Program Credit information to create a new one
     * - Rules of Access
     *  - User can update program
     *  = User can update semester
     *  - User can update level
     */
    public function store(ProgramCreditRequest $request) {
        $credit = $this->service()->repo()->create($request->all());
        return $this->json($credit);
    }

    /**
     * Update Program Credit
     * 
     * Modify information about an existing Program Credit by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Program Credit belongs to
     *  - User is Dean of Program Credit's faculty
     *  - User is HOD of Program Credit's department
     */
    public function update(Request $request, int $id) {
        $credit = $this->service()->repo()->single($id);
        $this->authorize('update', $credit);
        $credit = $this->service()->update($id, $request->all());
        return $this->json($credit);
    }
}
