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

    public function show(Request $request, ImageFilters $filters, $id) {
        $image = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $image); /** ensure the current user has view rights */
        return $image;
    }

    public function index(Request $request, ImageFilters $filters) {
        $images = $this->service()->repo()->list($request->user(), $filters);
        return $images;
    }

    public function destroy(Request $request, $id) {
        $image = $this->service()->repo()->single($id);
        $this->authorize('delete', $image); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(ImageRequest $request) {
        $image = $this->service()->create(array_merge([ 'location' => 'temp' ], $request->all()));

        $image = $this->upload($request, $image);

        return $this->json($image);
    }

    public function update(Request $request, $id) {
        if ($request->isMethod('put')) return $this->json([ 'message' => 'not implemented' ], 501);
        $image = $this->service()->repo()->single($id);
        $this->authorize('update', $image);
        $image = $this->upload($request, $image);
        return $this->json($image);
    }

    private function upload(Request $request, Image $image): Image {
        $file = $request->file('file');
        if ($file) {
            $image_name = $file->getRealPath();
            Cloudder::upload($image_name, null);
            $image->location = Cloudder::getPublicId();
            $image->save();
        }
        return $image;
    }
}
