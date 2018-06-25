<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProgramService;
use App\Filters\ProgramFilters;
use App\Http\Requests\ProgramRequest;

class ProgramController extends ApiController
{
    protected $service;

    public function __construct(ProgramService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, ProgramFilters $filters, int $id) {
        $program = $this->service()->repo()->program($id, $filters);
        $this->authorize('view', $program); /** ensure the current user has view rights */
        return $program;
    }

    public function index(Request $request, ProgramFilters $filters) {
        $programs = $this->service()->repo()->programs($request->user(), $filters);
        return $programs;
    }

    public function destroy(Request $request, int $id) {
        $program = $this->service()->repo()->program($id);
        $this->authorize('delete', $program); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(ProgramRequest $request) {
        $program = $this->service()->repo()->create($request->all());
        return $this->json($program);
    }

    public function update(Request $request, int $id) {
        $program = $this->service()->repo()->program($id);
        $this->authorize('update', $program);
        $program = $this->service()->repo()->update($id, $request->all());
        return $this->json($program);
    }
}
