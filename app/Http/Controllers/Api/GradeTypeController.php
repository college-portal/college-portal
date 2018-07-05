<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\GradeTypeService;
use App\Filters\GradeTypeFilters;
use App\Models\School;
use App\Http\Requests\GradeTypeRequest;

class GradeTypeController extends ApiController
{
    protected $service;

    public function __construct(GradeTypeService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Grade Type by ID
     */
    public function show(Request $request, GradeTypeFilters $filters, int $school_id, $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $gradeType = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $gradeType);
        return $gradeType;
    }

    /**
     * Get Grade Types
     */
    public function index(Request $request, GradeTypeFilters $filters, int $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $gradeTypes = $this->service()->repo()->list($request->user(), $filters);
        return $gradeTypes;
    }

    /**
     * Delete Grade Type
     */
    public function destroy(Request $request, int $school_id, $id) {
        $this->authorize('update', School::findOrFail($school_id));
        $gradeType = $this->service()->repo()->single($id);
        $this->authorize('delete', $gradeType); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Grade Type
     */
    public function store(GradeTypeRequest $request, int $school_id) {
        $this->authorize('update', School::findOrFail($school_id));
        $gradeType = $this->service()->repo()->create(array_merge($request->all(), [ 'school_id' => $school_id ]));
        return $this->json($gradeType);
    }

    /**
     * Update Grade Type
     */
    public function update(Request $request, int $school_id, $id) {
        $this->authorize('update', School::findOrFail($school_id));
        $gradeType = $this->service()->repo()->single($id);
        $this->authorize('update', $gradeType);
        $gradeType = $this->service()->update($id, $request->all());
        return $this->json($gradeType);
    }
}
