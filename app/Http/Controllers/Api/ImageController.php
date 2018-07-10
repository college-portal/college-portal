<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Filters\ImageFilters;
use App\Http\Requests\ImageRequest;
use JD\Cloudder\Facades\Cloudder;
use App\Models\Image;

class ImageController extends ApiController
{
    protected $service;

    public function __construct(ImageService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Image by ID
     * 
     * Responds with a specific Image by its ID
     * - Rules of Access
     *   - User is in the same school
     */
    public function show(Request $request, ImageFilters $filters, $id) {
        $image = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $image); /** ensure the current user has view rights */
        return $image;
    }

    /**
     * Get Images
     * 
     * Responds with a list of Images
     * - Rules of Access
     *   - User is in the same school
     */
    public function index(Request $request, ImageFilters $filters) {
        $images = $this->service()->repo()->list($request->user(), $filters);
        return $images;
    }

    /**
     * Delete Image
     * 
     * Removes a Image from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Image belongs to
     */
    public function destroy(Request $request, $id) {
        $image = $this->service()->repo()->single($id);
        $this->authorize('delete', $image); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Image
     * 
     * Supply Image information to create a new one
     * - Rules of Access
     *  - User can view image type and 
     *  - User can update image owner
     */
    public function store(ImageRequest $request) {
        $image = $this->service()->create(array_merge([ 'location' => 'temp' ], $request->all()));

        $image = $this->upload($request, $image);

        return $this->created($image);
    }

    /**
     * Update Image
     * 
     * Modify information about an existing Image by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Image belongs to
     */
    public function update(Request $request, $id) {
        if ($request->isMethod('put')) return $this->json([ 'message' => 'Make a POST requested instead' ], 501);
        $image = $this->service()->repo()->single($id);
        $this->authorize('update', $image);
        $image = $this->upload($request, $image);
        return $this->json($image);
    }

    private function upload(Request $request, Image $image): Image {
        $file = $request->file('file');
        if ($file) {
            $image_name = $file->getRealPath();
            Cloudder::upload($image_name, $image->location);
            $image->location = Cloudder::getPublicId();
            $image->save();
        }
        return $image;
    }
}
