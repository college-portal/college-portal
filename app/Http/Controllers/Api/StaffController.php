<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\StaffService;
use App\Filters\StaffFilters;
use App\Http\Requests\StaffRequest;

class StaffController extends ApiController
{
    protected $service;

    public function __construct(StaffService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, StaffFilters $filters, $id) {
        $staff = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $staff); /** ensure the current user has view rights */
        return $staff;
    }

    public function index(Request $request, StaffFilters $filters) {
        $staff = $this->service()->repo()->list($request->user(), $filters);
        return $staff;
    }

    public function destroy(Request $request, $id) {
        $staff = $this->service()->repo()->single($id);
        $this->authorize('delete', $staff); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(StaffRequest $request) {
        $staff = $this->service()->repo()->create($request->all());
        return $this->json($staff);
    }

    public function update(Request $request, $id) {
        $staff = $this->service()->repo()->single($id);
        $this->authorize('update', $staff);
        $staff = $this->service()->repo()->update($id, $request->all());
        return $this->json($staff);
    }
}
