<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PayableService;
use App\Filters\PayableFilters;
use App\Http\Requests\PayableRequest;

class PayableController extends ApiController
{
    protected $service;

    public function __construct(PayableService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, PayableFilters $filters, $id) {
        $payable = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $payable); /** ensure the current user has view rights */
        return $payable;
    }

    public function index(Request $request, PayableFilters $filters) {
        $payables = $this->service()->repo()->list($request->user(), $filters);
        return $payables;
    }

    public function destroy(Request $request, $id) {
        $payable = $this->service()->repo()->single($id);
        $this->authorize('delete', $payable); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(PayableRequest $request) {
        $payable = $this->service()->repo()->create(array_merge([ 'user_id' => auth()->user()->id ], $request->all()));
        return $this->json($payable);
    }

    public function update(Request $request, $id) {
        $payable = $this->service()->repo()->single($id);
        $this->authorize('update', $payable);
        $payable = $this->service()->repo()->update($id, $request->all());
        return $this->json($payable);
    }
}
