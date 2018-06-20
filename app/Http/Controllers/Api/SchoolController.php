<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SchoolService;
use App\Filters\SchoolFilters;
use App\Http\Requests\SchoolRequest;

class SchoolController extends ApiController
{
    protected $service;

    public function __construct(SchoolService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, SchoolFilters $filters, $id) {
        $school = $this->service()->repo()->school($request->user(), $id, $filters);
        $this->authorize('view', $school); /** ensure the current user has view rights */
        return $school;
    }

    public function index(Request $request, SchoolFilters $filters) {
        return $this->service()->repo()->schools($request->user(), $filters);
    }

    public function destroy(Request $request, $id) {
        $school = $this->service()->repo()->school($request->user(), $id);
        $this->authorize('delete', $school); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($request->user(), $id);
        return $this->ok();
    }

    public function store(SchoolRequest $request) {
        $school = $this->service()->repo()->create($request->user(), $request->all());
        return $this->json($school);
    }

    public function update(Request $request, $id) {
        $school = $this->service()->repo()->school($request->user(), $id);
        $this->authorize('update', $school);
        $school = $this->service()->repo()->update($request->user(), $id, $request->all());
        return $this->json($school);
    }
}
