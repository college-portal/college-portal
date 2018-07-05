<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ChargeableService;
use App\Filters\ChargeableServiceFilters;
use App\Http\Requests\ChargeableServiceRequest;

class ChargeableServiceController extends ApiController
{
    protected $service;

    public function __construct(ChargeableService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Chargeable Service by ID
     */
    public function show(Request $request, ChargeableServiceFilters $filters, int $id) {
        $service = $this->service()->serviceRepo()->single($id, $filters);
        $this->authorize('view', $service); /** ensure the current user has view rights */
        return $service;
    }

    /**
     * Get Chargeable Services
     */
    public function index(Request $request, ChargeableServiceFilters $filters) {
        $services = $this->service()->serviceRepo()->list($request->user(), $filters);
        return $services;
    }

    /**
     * Delete Chargeable Service
     */
    public function destroy(Request $request, int $id) {
        $service = $this->service()->serviceRepo()->single($id);
        $this->authorize('delete', $service); /** ensure the current user has delete rights */
        $this->service()->serviceRepo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Chargeable Service
     */
    public function store(ChargeableServiceRequest $request) {
        $service = $this->service()->serviceRepo()->create($request->all());
        return $this->json($service);
    }

    /**
     * Update Chargeable Service
     */
    public function update(Request $request, int $id) {
        $service = $this->service()->serviceRepo()->single($id);
        $this->authorize('update', $service);
        $service = $this->service()->serviceRepo()->update($id, $request->all());
        return $this->json($service);
    }
}
