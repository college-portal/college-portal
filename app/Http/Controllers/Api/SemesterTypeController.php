<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SemesterTypeService;
use App\Filters\SemesterTypeFilters;
use App\Models\School;
use App\Http\Requests\SemesterTypeRequest;

class SemesterTypeController extends ApiController
{
    protected $service;

    public function __construct(SemesterTypeService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Semester Type by ID
     * 
     * Responds with a specific Semester Type by its ID
     */
    public function show(Request $request, SemesterTypeFilters $filters, int $school_id, int $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $type = $this->service()->repo()->type($id, $filters);
        $this->authorize('view', $type);
        return $type;
    }

    /**
     * Get Semester Types
     * 
     * Responds with a list of Semester Types
     */
    public function index(Request $request, SemesterTypeFilters $filters, int $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $types = $this->service()->repo()->types($request->user(), $filters);
        return $types;
    }

    /**
     * Delete Semester Type
     * 
     * Removes a Semester Type from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Semester Type belongs to
     */
    public function destroy(Request $request, int $school_id, int $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $type = $this->service()->repo()->type($id);
        $this->authorize('delete', $type); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Semester Type
     */
    public function store(SemesterTypeRequest $request, int $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $type = $this->service()->repo()->create(array_merge($request->all(), [ 'school_id' => $school_id ]));
        return $this->json($type);
    }

    /**
     * Update Semester Type
     * 
     * Modify information about an existing Semester Type by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Semester Type belongs to
     */
    public function update(Request $request, int $school_id, int $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $type = $this->service()->repo()->type($id);
        $this->authorize('update', $type);
        $type = $this->service()->repo()->update($id, $request->all());
        return $this->json($type);
    }
}
