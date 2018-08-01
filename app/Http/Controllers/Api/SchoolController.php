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

    /**
     * Get School by ID
     * 
     * Responds with a specific School by its ID
     * - Rules of Access
     *   - User is admin or in school
     * - Filters
     *   - ?with_schools
     */
    public function show(Request $request, SchoolFilters $filters, int $id) {
        $school = $this->service()->repo()->school($id, $filters);
        $this->authorize('view', $school); /** ensure the current user has view rights */
        return $school;
    }

    /**
     * Get Schools
     * 
     * Responds with a list of Schools
     * - Rules of Access
     *   - User is admin or in school
     * - Filters
     *   - ?with_schools
     */
    public function index(Request $request, SchoolFilters $filters) {
        return $this->service()->repo()->schools($request->user(), $filters);
    }

    /**
     * Delete School
     * 
     * Removes a School from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns the School
     */
    public function destroy(Request $request, int $id) {
        $school = $this->service()->repo()->school($id);
        $this->authorize('delete', $school); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create School
     * 
     * Supply School information to create a new one
     */
    public function store(SchoolRequest $request) {
        $user = auth()->user()->first();
        $school = $this->service()->repo()->create(array_merge($request->all(), [ 'owner_id' => $user->id ]));
        return $this->created($school);
    }

    /**
     * Update School
     * 
     * Modify information about an existing School by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns the School
     */
    public function update(Request $request, int $id) {
        $school = $this->service()->repo()->school($id);
        $user = auth()->user()->first();
        $this->authorize('update', $school);
        $school = $this->service()->repo()->update($id, array_merge($request->all(), [ 'owner_id' => $user->id ]));
        return $this->json($school);
    }
}
