<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ContentService;
use App\Filters\ContentFilters;
use App\Http\Requests\ContentRequest;

class ContentController extends ApiController
{
    protected $service;

    public function __construct(ContentService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, ContentFilters $filters, $id) {
        $content = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $content); /** ensure the current user has view rights */
        return $content;
    }

    public function index(Request $request, ContentFilters $filters) {
        $contents = $this->service()->repo()->list($request->user(), $filters);
        return $contents;
    }

    public function destroy(Request $request, $id) {
        $content = $this->service()->repo()->single($id);
        $this->authorize('delete', $content); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(ContentRequest $request) {
        $content = $this->service()->create($request->all());
        return $this->created($content);
    }

    public function update(Request $request, $id) {
        $grade = $this->service()->repo()->single($id);
        $this->authorize('update', $grade);
        $grade = $this->service()->update($id, $request->all());
        return $this->json($grade);
    }
}
