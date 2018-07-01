<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\GradeService;
use App\Filters\GradeFilters;
use App\Http\Requests\GradeRequest;

class GradeController extends ApiController
{
    protected $service;

    public function __construct(GradeService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, GradeFilters $filters, $id) {
        $grade = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $grade); /** ensure the current user has view rights */
        return $grade;
    }

    public function index(Request $request, GradeFilters $filters) {
        $grades = $this->service()->repo()->list($request->user(), $filters);
        return $grades;
    }

    public function destroy(Request $request, $id) {
        $grade = $this->service()->repo()->single($id);
        $this->authorize('delete', $grade); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(GradeRequest $request) {
        $grade = $this->service()->repo()->create(array_merge([ 'user_id' => auth()->user()->id ], $request->all()));
        return $this->json($grade);
    }

    public function update(Request $request, $id) {
        $grade = $this->service()->repo()->single($id);
        $this->authorize('update', $grade);
        $grade = $this->service()->repo()->update($id, $request->all());
        return $this->json($grade);
    }
}
