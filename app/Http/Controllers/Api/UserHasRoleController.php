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

    public function show(Request $request, UserHasRoleFilters $filters, $id) {
        $userHasRole = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $userHasRole); /** ensure the current user has view rights */
        return $userHasRole;
    }

    public function index(Request $request, UserHasRoleFilters $filters) {
        return $this->service()->repo()->list($request->user(), $filters);
    }

    public function destroy(Request $request, $id) {
        $userHasRole = $this->service()->repo()->single($id);
        $this->authorize('delete', $userHasRole); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(UserHasRoleRequest $request) {
        $userHasRole = $this->service()->repo()->create($request->all());
        return $this->created($userHasRole);
    }

    public function update(Request $request, $id) {
        return $this->json([ 'message' => 'This action is to be handled by the System' ], 501);
    }
}
