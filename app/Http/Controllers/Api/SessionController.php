<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SessionService;
use App\Filters\SessionFilters;
use CollegePortal\Models\School;
use App\Http\Requests\SessionRequest;

class SessionController extends ApiController
{
    protected $service;

    public function __construct(SessionService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Session by ID
     * 
     * Responds with a specific Session by its ID
     * - Rules of Access
     *   - User is same school as Session
     */
    public function show(Request $request, SessionFilters $filters, int $id) {
        $session = $this->service()->repo()->session($id, $filters);
        $this->authorize('view', $session);
        return $session;
    }

    /**
     * Get Sessions
     * 
     * Responds with a list of Sessions
     * - Rules of Access
     *   - User is same school as Session
     */
    public function index(Request $request, SessionFilters $filters) {
        $sessions = $this->service()->repo()->sessions($request->user(), $filters);
        return $sessions;
    }

    /**
     * Delete Session
     * 
     * Removes a Session from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Session belongs to
     */
    public function destroy(Request $request, int $id) {
        $session = $this->service()->repo()->session($id);
        $this->authorize('delete', $session); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Session
     * 
     * Supply Session information to create a new one
     * - Rules of Access
     *  - User can update Session's school
     */
    public function store(SessionRequest $request) {
        $session = $this->service()->repo()->create($request->all());
        return $this->created($session);
    }

    /**
     * Update Session
     * 
     * Modify information about an existing Session by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Session belongs to
     */
    public function update(Request $request, int $id) {
        $session = $this->service()->repo()->session($id);
        $this->authorize('update', $session);
        $session = $this->service()->repo()->update($id, $request->all());
        return $this->json($session);
    }
}
