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

    /**
     * Get Chargeable by ID
     * 
     * Responds with a specific Chargeable by its ID
     * - Rules of Access
     *   - User is in same school as the Chargeable
     * - Filters
     *  - ?with_service (includes the chargeable service)
     *  - ?with_owner (includes the chargeable's owner)
     *  - ?with_school (includes the chargeable's school)
     *  - ?service={id} (filters by the chargeable service id)
     *  - ?owner={id} (filters by the owner id)
     *  - ?min_amount={amount} (filters by minimum amount)
     *  - ?max_amount={amount} (filters by maximum amount)
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function show(Request $request, ChargeableFilters $filters, int $id) {
        $chargeable = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $chargeable); /** ensure the current user has view rights */
        return $chargeable;
    }

    /**
     * Gets Chargeables
     * 
     * Responds with a list of Chargeables
     * - Rules of Access
     *   - User is in same school as the Chargeable
     * - Filters
     *  - ?with_service (includes the chargeable service)
     *  - ?with_owner (includes the chargeable's owner)
     *  - ?with_school (includes the chargeable's school)
     *  - ?service={id} (filters by the chargeable service id)
     *  - ?owner={id} (filters by the owner id)
     *  - ?min_amount={amount} (filters by minimum amount)
     *  - ?max_amount={amount} (filters by maximum amount)
     */
    public function index(Request $request, ChargeableFilters $filters) {
        $chargeables = $this->service()->repo()->list($request->user(), $filters);
        return $chargeables;
    }

    /**
     * Delete Chargeable
     * 
     * Removes a Chargeable from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Chargeable belongs to
     */
    public function destroy(Request $request, int $id) {
        $chargeable = $this->service()->repo()->single($id);
        $this->authorize('delete', $chargeable); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Chargeable
     * 
     * Supply chargeable information to create a new one
     * - Rules of Access
     *  - User can view Chargeable Service and
     *  - User can update the owner of the Chargeable (See Chargeable Model)
     */
    public function store(ChargeableRequest $request) {
        $chargeable = $this->service()->create($request->all());
        return $this->created($chargeable);
    }

    /**
     * Update Chargeable
     * 
     * Modify information about an existing chargeable by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Chargeable belongs to
     */
    public function update(Request $request, int $id) {
        $chargeable = $this->service()->repo()->single($id);
        $this->authorize('update', $chargeable);
        $chargeable = $this->service()->update($id, $request->all());
        return $this->json($chargeable);
    }
}
