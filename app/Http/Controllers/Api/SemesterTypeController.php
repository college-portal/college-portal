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

    public function show(Request $request, SemesterTypeFilters $filters, $school_id, $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $type = $this->service()->repo()->type($id, $filters);
        $this->authorize('view', $type);
        return $type;
    }

    public function index(Request $request, SemesterTypeFilters $filters, $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $types = $this->service()->repo()->types($request->user(), $filters);
        return $types;
    }

    public function destroy(Request $request, $school_id, $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $type = $this->service()->repo()->type($id);
        $this->authorize('delete', $type); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(SemesterTypeRequest $request, $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $type = $this->service()->repo()->create(array_merge($request->all(), [ 'school_id' => $school_id ]));
        return $this->json($type);
    }

    public function update(Request $request, $school_id, $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $type = $this->service()->repo()->type($id);
        $this->authorize('update', $type);
        $type = $this->service()->repo()->update($id, $request->all());
        return $this->json($type);
    }
}
