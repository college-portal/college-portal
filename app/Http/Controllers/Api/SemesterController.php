<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SemesterService;
use App\Filters\SemesterFilters;
use App\Http\Requests\SemesterRequest;

class SemesterController extends ApiController
{
    protected $service;

    public function __construct(SemesterService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, SemesterFilters $filters, $id) {
        $semester = $this->service()->repo()->semester($id, $filters);
        $this->authorize('view', $semester);
        return $semester;
    }

    public function index(Request $request, SemesterFilters $filters) {
        $semesters = $this->service()->repo()->semesters($request->user(), $filters);
        return $semesters;
    }

    public function destroy(Request $request, $id) {
        $semester = $this->service()->repo()->semester($id);
        $this->authorize('delete', $semester); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(SemesterRequest $request) {
        $semester = $this->service()->create($request->all());
        return $this->json($semester);
    }

    public function update(Request $request, $id) {
        $semester = $this->service()->repo()->semester($id);
        $this->authorize('update', $semester);
        $semester = $this->service()->update($id, $request->all());
        return $this->json($semester);
    }
}
