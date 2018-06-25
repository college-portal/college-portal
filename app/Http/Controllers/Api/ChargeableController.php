<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ChargeableService;
use App\Filters\ChargeableFilters;
use App\Http\Requests\ChargeableRequest;

class ChargeableController extends ApiController
{
    protected $service;

    public function __construct(ChargeableService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, ChargeableFilters $filters, int $id) {
        $chargeable = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $chargeable); /** ensure the current user has view rights */
        return $chargeable;
    }

    public function index(Request $request, ChargeableFilters $filters) {
        $chargeables = $this->service()->repo()->list($request->user(), $filters);
        return $chargeables;
    }

    public function destroy(Request $request, int $id) {
        $chargeable = $this->service()->repo()->single($id);
        $this->authorize('delete', $chargeable); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(ChargeableRequest $request) {
        $chargeable = $this->service()->create($request->all());
        return $this->json($chargeable);
    }

    public function update(Request $request, int $id) {
        $chargeable = $this->service()->repo()->single($id);
        $this->authorize('update', $chargeable);
        $chargeable = $this->service()->update($id, $request->all());
        return $this->json($chargeable);
    }
}
