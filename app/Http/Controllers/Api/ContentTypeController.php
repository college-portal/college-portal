<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use CollegePortal\Models\School;
use App\Services\ContentTypeService;
use App\Filters\ContentTypeFilters;
use App\Http\Requests\ContentTypeRequest;

/**
 * @resource Content Types
 *
 * For Endpoints handling Content Types, which represent an extension of a model,
 *   denoted by the $type property
 */
class ContentTypeController extends ApiController
{
    protected $service;

    public function __construct(ContentTypeService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Content Type by ID
     * 
     * Responds with a specific Content Type by its ID
     * - Rules of Access
     *   - User is in the same school
     */
    public function show(Request $request, ContentTypeFilters $filters, $id) {
        $contentType = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $contentType);
        return $contentType;
    }

    /**
     * Get Content Types
     * 
     * Responds with a list of Content Types
     * - Rules of Access
     *   - User is in the same school
     */
    public function index(Request $request, ContentTypeFilters $filters) {
        $contentTypes = $this->service()->repo()->list($request->user(), $filters);
        return $contentTypes;
    }

    /**
     * Delete Content Type
     * 
     * Removes a Content Type from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the ContentType belongs to
     */
    public function destroy(Request $request, $id) {
        $contentType = $this->service()->repo()->single($id);
        $this->authorize('delete', $contentType); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Content Type
     * 
     * Supply Content Type information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Content Type belongs to
     */
    public function store(ContentTypeRequest $request) {
        $contentType = $this->service()->create($request->all());
        return $this->created($contentType);
    }

    /**
     * Update Content Type
     * 
     * Modify information about an existing Content Type by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Content Type belongs to
     */
    public function update(Request $request, $id) {
        $contentType = $this->service()->repo()->single($id);
        $this->authorize('update', $contentType);
        $contentType = $this->service()->update($id, $request->all());
        return $this->json($contentType);
    }
}
