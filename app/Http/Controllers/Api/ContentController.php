<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ContentService;
use App\Filters\ContentFilters;
use App\Http\Requests\ContentRequest;

/**
 * @resource Contents
 *
 * For Endpoints handling Content, which represent a value property for a particular model,
 *  belonging to a Content Type
 */
class ContentController extends ApiController
{
    protected $service;

    public function __construct(ContentService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Content by ID
     * 
     * Responds with a specific Content by its ID
     * - Rules of Access
     *   - User is in the same school as the user who owns the content
     */
    public function show(Request $request, ContentFilters $filters, $id) {
        $content = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $content); /** ensure the current user has view rights */
        return $content;
    }

    /**
     * Get Contents
     * 
     * Responds with a list of Content
     */
    public function index(Request $request, ContentFilters $filters) {
        $contents = $this->service()->repo()->list($request->user(), $filters);
        return $contents;
    }

    /**
     * Delete Content
     * 
     * Removes a Content from the System by ID
     * - Rules of Access
     *  - User can update the model the Content belongs to
     */
    public function destroy(Request $request, $id) {
        $content = $this->service()->repo()->single($id);
        $this->authorize('delete', $content); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Content
     * 
     * Supply Content information to create a new one
     * - Rules of Access
     *  - User can update the model the Content belongs to
     */
    public function store(ContentRequest $request) {
        $content = $this->service()->create($request->all());
        return $this->created($content);
    }

    /**
     * Update Content
     * 
     * Modify information about an existing Content by ID
     * - Rules of Access
     *  - User can update the model the Content belongs to
     */
    public function update(Request $request, $id) {
        $grade = $this->service()->repo()->single($id);
        $this->authorize('update', $grade);
        $grade = $this->service()->update($id, $request->all());
        return $this->json($grade);
    }
}
