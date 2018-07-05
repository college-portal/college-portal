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
     */
    public function show(Request $request, ImageTypeFilters $filters, int $school_id, $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $imageType = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $imageType);
        return $imageType;
    }

    /**
     * Get Image Types
     */
    public function index(Request $request, ImageTypeFilters $filters, int $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $imageTypes = $this->service()->repo()->list($request->user(), $filters);
        return $imageTypes;
    }

    /**
     * Delete Image Type
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
     */
    public function store(ImageTypeRequest $request, int $school_id) {
        $this->authorize('update', School::findOrFail($school_id));
        $imageType = $this->service()->repo()->create(array_merge($request->all(), [ 'school_id' => $school_id ]));
        return $this->json($imageType);
    }

    /**
     * Update Image Type
     */
    public function update(Request $request, int $school_id, $id) {
        $this->authorize('update', School::findOrFail($school_id));
        $imageType = $this->service()->repo()->single($id);
        $this->authorize('update', $imageType);
        $imageType = $this->service()->update($id, $request->all());
        return $this->json($imageType);
    }
}
