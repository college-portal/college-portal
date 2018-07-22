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

    public function show(Request $request, RoleFilters $filters, $id) {
        $role = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $role); /** ensure the current user has view rights */
        return $role;
    }

    public function index(Request $request, RoleFilters $filters) {
        return $this->service()->repo()->list($request->user(), $filters);
    }

    public function destroy(Request $request, $id) {
        $role = $this->service()->repo()->single($id);
        $this->authorize('delete', $role); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(RoleRequest $request) {
        $role = $this->service()->repo()->create($request->all());
        return $this->created($role);
    }

    public function update(Request $request, $id) {
        $role = $this->service()->repo()->single($id);
        $this->authorize('update', $role);
        $role = $this->service()->update($id, $request->all());
        return $this->json($role);
    }
}
