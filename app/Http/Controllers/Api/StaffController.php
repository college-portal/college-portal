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

    /**
     * Get Staff by ID
     */
    public function show(Request $request, StaffFilters $filters, int $id) {
        $staff = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $staff); /** ensure the current user has view rights */
        return $staff;
    }

    /**
     * Get Staff
     */
    public function index(Request $request, StaffFilters $filters) {
        $staff = $this->service()->repo()->list($request->user(), $filters);
        return $staff;
    }

    /**
     * Delete Staff
     */
    public function destroy(Request $request, int $id) {
        $staff = $this->service()->repo()->single($id);
        $this->authorize('delete', $staff); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Staff
     */
    public function store(StaffRequest $request) {
        $staff = $this->service()->repo()->create($request->all());
        return $this->json($staff);
    }

    /**
     * Update Staff
     */
    public function update(Request $request, int $id) {
        $staff = $this->service()->update($id, $request->all());
        return $this->json($staff);
    }
}
