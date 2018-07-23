<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Filters\RoleFilters;
use App\Http\Requests\RoleRequest;

class RoleController extends ApiController
{
    protected $service;

    public function __construct(RoleService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Role by ID
     * 
     * Responds with a specific Role by its ID
     * - Rules of Access
     *   - Anyone can view
     */
    public function show(Request $request, RoleFilters $filters, $id) {
        $role = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $role); /** ensure the current user has view rights */
        return $role;
    }

    /**
     * Get Roles
     * 
     * Responds with a list of Roles
     * - Rules of Access
     *   - Anyone
     */
    public function index(Request $request, RoleFilters $filters) {
        return $this->service()->repo()->list($request->user(), $filters);
    }

    /**
     * Delete Role
     * 
     * Removes a Role from the system
     * - Rules of Access
     *   - User is an ADMIN or
     *   - User is a SCHOOL_OWNER
     */
    public function destroy(Request $request, $id) {
        $role = $this->service()->repo()->single($id);
        $this->authorize('delete', $role); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Role
     * 
     * Supply Role Information to create a new one
     */
    public function store(RoleRequest $request) {
        $role = $this->service()->repo()->create($request->all());
        return $this->created($role);
    }

    /**
     * Update Role
     * 
     * Modify Information about an existing Role
     */
    public function update(Request $request, $id) {
        $role = $this->service()->repo()->single($id);
        $this->authorize('update', $role);
        $role = $this->service()->update($id, $request->all());
        return $this->json($role);
    }
}
