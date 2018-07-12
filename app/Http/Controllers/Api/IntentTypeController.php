<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\IntentTypeService;
use App\Filters\IntentTypeFilters;
use App\Http\Requests\IntentTypeRequest;

class IntentTypeController extends ApiController
{
    protected $service;

    public function __construct(IntentTypeService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, IntentTypeFilters $filters, $id) {
        $type = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $type); /** ensure the current user has view rights */
        return $type;
    }

    public function index(Request $request, IntentTypeFilters $filters) {
        $types = $this->service()->repo()->list($request->user(), $filters);
        return $types;
    }

    public function destroy(Request $request, $id) {
        $type = $this->service()->repo()->single($id);
        $this->authorize('delete', $type); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(IntentTypeRequest $request) {
        $type = $this->service()->repo()->create($request->all());
        return $this->created($type);
    }

    public function update(Request $request, $id) {
        $type = $this->service()->repo()->single($id);
        $this->authorize('update', $type);
        $type = $this->service()->repo()->update($id, $request->all());
        return $this->json($type);
    }
}
