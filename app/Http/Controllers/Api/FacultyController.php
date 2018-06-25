<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\FacultyService;
use App\Services\SchoolService;
use App\Filters\FacultyFilters;
use App\Http\Requests\FacultyRequest;
use App\Http\Resources\FacultyResource;

class FacultyController extends ApiController
{
    protected $service, $schoolService;

    public function __construct(FacultyService $service, SchoolService $schoolService) {
        $this->service = $service;
        $this->schoolService = $schoolService;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, FacultyFilters $filters, int $id) {
        $faculty = $this->service()->repo()->faculty($id, $filters);
        $this->authorize('view', $faculty); /** ensure the current user has view rights */
        return $faculty;
    }

    public function index(Request $request, FacultyFilters $filters) {
        $faculties = $this->service()->repo()->faculties($request->user(), $filters);
        return $faculties;
    }

    public function destroy(Request $request, int $id) {
        $faculty = $this->service()->repo()->faculty($id);
        $this->authorize('delete', $faculty); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(FacultyRequest $request) {
        $school = $this->schoolService->repo()->school($request->user(), $request->school_id);
        $faculty = $this->service()->repo()->create($request->all());
        return $this->json($faculty);
    }

    public function update(Request $request, int $id) {
        $faculty = $this->service()->repo()->faculty($id);
        $this->authorize('update', $faculty);
        $faculty = $this->service()->repo()->update($id, $request->all());
        return $this->json($faculty);
    }
}
