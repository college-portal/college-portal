<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserHasRoleService;
use App\Filters\UserHasRoleFilters;
use App\Http\Requests\UserHasRoleRequest;

class UserHasRoleController extends ApiController
{
    protected $service;

    public function __construct(UserHasRoleService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get UserHasRole by ID
     * 
     * Responds with a specific UserHasRole by its ID
     * - Rules of Access
     *   - Current User can view User whose UserHasRole Info is being accessed
     */
    public function show(Request $request, UserHasRoleFilters $filters, $id) {
        $userHasRole = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $userHasRole); /** ensure the current user has view rights */
        return $userHasRole;
    }

    /**
     * Get UserHasRoles
     * 
     * Responds with a list of UserHasRole
     * - Rules of Access
     *   - Current User can view User whose UserHasRole Info is being accessed
     */
    public function index(Request $request, UserHasRoleFilters $filters) {
        return $this->service()->repo()->list($request->user(), $filters);
    }

    /**
     * Delete UserHasRole
     * 
     * Removes a particular UserHasRole from the system
     * - Rules of Access
     *   - User is an ADMIN or
     *   - User owns School
     */
    public function destroy(Request $request, $id) {
        $userHasRole = $this->service()->repo()->single($id);
        $this->authorize('delete', $userHasRole); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create UserHasRole
     * 
     * Supply UserHasRole Information to create a new one
     * - Rules of Access
     *   - User is an ADMIN or
     *   - User owns School
     */
    public function store(UserHasRoleRequest $request) {
        $userHasRole = $this->service()->repo()->create($request->all());
        return $this->created($userHasRole);
    }

    /**
     * Update UserHasRole (Not Supported)
     * 
     * Modify Information about an existing UserHasRole
     */
    public function update(Request $request, $id) {
        return $this->json([ 'message' => 'This action is to be handled by the System' ], 501);
    }
}
