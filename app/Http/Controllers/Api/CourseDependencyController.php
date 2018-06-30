<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CourseDependencyService;
use App\Filters\CourseDependencyFilters;
use App\Http\Requests\CourseDependencyRequest;

class CourseDependencyController extends ApiController
{
    protected $service;

    public function __construct(CourseDependencyService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, CourseDependencyFilters $filters, $id) {
        $dependency = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $dependency); /** ensure the current user has view rights */
        return $dependency;
    }

    public function index(Request $request, CourseDependencyFilters $filters) {
        $dependencies = $this->service()->repo()->list($request->user(), $filters);
        return $dependencies;
    }

    public function destroy(Request $request, $id) {
        $dependency = $this->service()->repo()->single($id);
        $this->authorize('delete', $dependency); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(CourseDependencyRequest $request) {
        $courseDependency = $this->service()->repo()->create($request->all());
        return $this->json($courseDependency);
    }

    public function update(Request $request, $id) {
        $dependency = $this->service()->update($id, $request->all());
        return $this->json($dependency);
    }
}
