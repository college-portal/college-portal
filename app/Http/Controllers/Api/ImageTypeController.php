<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\School;
use App\Services\ImageTypeService;
use App\Filters\ImageTypeFilters;
use App\Http\Requests\ImageTypeRequest;

class ImageTypeController extends ApiController
{
    protected $service;

    public function __construct(ImageTypeService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Image Type by ID
     * 
     * Responds with a specific Image Type by its ID
     * - Rules of Access
     *   - User is in the same school
     */
    public function show(Request $request, ImageTypeFilters $filters, int $school_id, $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $imageType = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $imageType);
        return $imageType;
    }

    /**
     * Get Image Types
     * 
     * Responds with a list of Image Types
     * - Rules of Access
     *   - User is in the same school
     */
    public function index(Request $request, ImageTypeFilters $filters, int $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $imageTypes = $this->service()->repo()->list($request->user(), $filters);
        return $imageTypes;
    }

    /**
     * Delete Image Type
     * 
     * Removes a Image Type from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Image belongs to
     */
    public function destroy(Request $request, int $school_id, $id) {
        $this->authorize('update', School::findOrFail($school_id));
        $imageType = $this->service()->repo()->single($id);
        $this->authorize('delete', $imageType); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Image Type
     * 
     * Supply Image Type information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Image Type belongs to
     */
    public function store(ImageTypeRequest $request, int $school_id) {
        $this->authorize('update', School::findOrFail($school_id));
        $imageType = $this->service()->repo()->create(array_merge($request->all(), [ 'school_id' => $school_id ]));
        return $this->created($imageType);
    }

    /**
     * Update Image Type
     * 
     * Modify information about an existing Image Type by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Image belongs to
     */
    public function update(Request $request, int $school_id, $id) {
        $this->authorize('update', School::findOrFail($school_id));
        $imageType = $this->service()->repo()->single($id);
        $this->authorize('update', $imageType);
        $imageType = $this->service()->update($id, $request->all());
        return $this->json($imageType);
    }
}
