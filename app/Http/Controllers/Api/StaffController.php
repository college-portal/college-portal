<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\StaffService;
use App\Filters\StaffFilters;
use App\Http\Requests\StaffRequest;

/**
 * @resource Staff
 *
 * For Endpoints handling Staff, which represent a User 
 *  having a "staff" role within a School
 */
class StaffController extends ApiController
{
    protected $service;

    public function __construct(StaffService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Staff by ID
     * 
     * Responds with a specific Staff by its ID
     * - Rules of Access
     *   - User is same school as Staff
     */
    public function show(Request $request, StaffFilters $filters, int $id) {
        $staff = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $staff); /** ensure the current user has view rights */
        return $staff;
    }

    /**
     * Get Staff
     * 
     * Responds with a list of Staff
     * - Rules of Access
     *   - User is same school as Staff
     */
    public function index(Request $request, StaffFilters $filters) {
        $staff = $this->service()->repo()->list($request->user(), $filters);
        return $staff;
    }

    /**
     * Delete Staff
     * 
     * Removes a Staff from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Staff belongs to or
     *  - User is HOD in staff's department or
     *  - User is Dean of Staff's Faculty
     */
    public function destroy(Request $request, int $id) {
        $staff = $this->service()->repo()->single($id);
        $this->authorize('delete', $staff); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Staff
     * 
     * Supply Staff information to create a new one
     * - Rules of Access
     *  - User can update Department staff is to be in or
     *  - User can update School staff is to be in or
     *  - User can update the staff user's info
     */
    public function store(StaffRequest $request) {
        $staff = $this->service()->repo()->create($request->all());
        return $this->created($staff);
    }

    /**
     * Update Staff
     * 
     * Modify information about an existing Staff by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Staff belongs to or
     *  - User is HOD in staff's department or
     *  - User is Dean of Staff's Faculty
     */
    public function update(Request $request, int $id) {
        $staff = $this->service()->update($id, $request->all());
        return $this->json($staff);
    }
}
