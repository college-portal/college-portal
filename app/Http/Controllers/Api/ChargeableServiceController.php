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
     * 
     * Responds with a specific chargeable service by its ID
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_schools
     *   - ?with_chargeables
     *   - ?school={id}
     */
    public function show(Request $request, ChargeableServiceFilters $filters, int $id) {
        $service = $this->service()->serviceRepo()->single($id, $filters);
        $this->authorize('view', $service); /** ensure the current user has view rights */
        return $service;
    }

    /**
     * Get Chargeable Services
     * 
     * Responds with a list of chargeable services
     * - Rules of Access
     *   - User is in the same school
     * - Filters
     *   - ?with_schools
     *   - ?with_chargeables
     *   - ?school={id}
     */
    public function index(Request $request, ChargeableServiceFilters $filters) {
        $services = $this->service()->serviceRepo()->list($request->user(), $filters);
        return $services;
    }

    /**
     * Delete Chargeable Service
     * 
     * Removes a Chargeable Service from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Chargeable Service belongs to
     */
    public function destroy(Request $request, int $id) {
        $service = $this->service()->serviceRepo()->single($id);
        $this->authorize('delete', $service); /** ensure the current user has delete rights */
        $this->service()->serviceRepo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Chargeable Service
     * 
     * Supply chargeable service information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Chargeable Service belongs to
     */
    public function store(ChargeableServiceRequest $request) {
        $service = $this->service()->serviceRepo()->create($request->all());
        return $this->created($service);
    }

    /**
     * Update Chargeable Service
     * 
     * Modify information about an existing Chargeable Service by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Chargeable Service belongs to
     */
    public function update(Request $request, int $id) {
        $service = $this->service()->serviceRepo()->single($id);
        $this->authorize('update', $service);
        $service = $this->service()->serviceRepo()->update($id, $request->all());
        return $this->json($service);
    }
}
