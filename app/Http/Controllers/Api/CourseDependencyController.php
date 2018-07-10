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

    /**
     * Get Course Dependency by ID
     * 
     * Responds with a specific Course Dependency by its ID
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_course
     *   - ?with_dependency
     */
    public function show(Request $request, CourseDependencyFilters $filters, $id) {
        $dependency = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $dependency); /** ensure the current user has view rights */
        return $dependency;
    }

    /**
     * Get Course Dependencies
     * 
     * Responds with a list of Course Dependencies
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_course
     *   - ?with_dependency
     *   - ?course={id} filter by course id
     *   - ?dependency={id} filter by dependency id (also a course)
     */
    public function index(Request $request, CourseDependencyFilters $filters) {
        $dependencies = $this->service()->repo()->list($request->user(), $filters);
        return $dependencies;
    }

    /**
     * Delete Course Dependency
     * 
     * Removes a Course Dependency from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Course and Dependency belongs to or
     *  - User is Dean of Faculty the Course and Dependency belongs to or
     *  - User is HOD of Department the Course and Dependency belongs to
     */
    public function destroy(Request $request, $id) {
        $dependency = $this->service()->repo()->single($id);
        $this->authorize('delete', $dependency); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Course Dependency
     * 
     * Supply Course information to create a new one
     * - Rules of Access
     *  - User can update course and
     *  - User can update dependency
     */
    public function store(CourseDependencyRequest $request) {
        $courseDependency = $this->service()->repo()->create($request->all());
        return $this->created($courseDependency);
    }

    /**
     * Update Course Dependency
     * 
     * Modifies information about an existing Course Dependency
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Course and Dependency belongs to or
     *  - User is Dean of Faculty the Course and Dependency belongs to or
     *  - User is HOD of Department the Course and Dependency belongs to
     */
    public function update(Request $request, $id) {
        $dependency = $this->service()->update($id, $request->all());
        return $this->json($dependency);
    }
}
