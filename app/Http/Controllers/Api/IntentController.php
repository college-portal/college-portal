<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\IntentService;
use App\Filters\IntentFilters;
use App\Http\Requests\IntentRequest;

class IntentController extends ApiController
{
    protected $service;

    public function __construct(IntentService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, IntentFilters $filters, $id) {
        $intent = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $intent); /** ensure the current user has view rights */
        return $intent;
    }

    public function index(Request $request, IntentFilters $filters) {
        $intents = $this->service()->repo()->list($request->user(), $filters);
        return $intents;
    }

    public function destroy(Request $request, $id) {
        $intent = $this->service()->repo()->single($id);
        $this->authorize('delete', $intent); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(IntentRequest $request) {
        $intent = $this->service()->create(array_merge([ 'user_id' => $request->user()->id ], $request->all()));
        return $this->created($intent);
    }

    public function update(Request $request, $id) {
        return $this->json([ 'message' => 'This action is to be handled by the System' ], 501);
    }
}
