<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProspectService;
use App\Filters\ProspectFilters;
use App\Http\Requests\ProspectRequest;

class ProspectController extends ApiController
{
    protected $service;

    public function __construct(ProspectService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Prospect by ID
     * 
     * Responds with a specific Prospect by its ID
     * - Rules of Access
     *   - User is an ADMIN or SCHOOL_OWNER of prospect's school
     */
    public function show(Request $request, ProspectFilters $filters, $id) {
        $prospect = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $prospect); /** ensure the current user has view rights */
        return $prospect;
    }

    /**
     * Get Prospects
     * 
     * Responds with a list of Prospects
     * - Rules of Access
     *   - User is same school as prospect
     */
    public function index(Request $request, ProspectFilters $filters) {
        $prospects = $this->service()->repo()->list($request->user(), $filters);
        return $prospects;
    }

    /**
     * Delete Prospect
     * 
     * Removes a Prospect from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Prospect belongs to
     */
    public function destroy(Request $request, $id) {
        $prospect = $this->service()->repo()->single($id);
        $this->authorize('delete', $prospect); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Prospect
     * 
     * Supply Prospect information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Program belongs to
     */
    public function store(ProspectRequest $request) {
        $prospect = $this->service()->repo()->create(array_merge($request->all(), [ 'user_id' => $request->user()->id ]));
        return $this->created($prospect);
    }

    /**
     * Update Prospect
     * 
     * Modify information about an existing Program by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Program belongs to
     */
    public function update(Request $request, $id) {
        $prospect = $this->service()->repo()->single($id);
        $this->authorize('update', $prospect);
        $prospect = $this->service()->update($id, $request->all());
        return $this->json($prospect);
    }
}
