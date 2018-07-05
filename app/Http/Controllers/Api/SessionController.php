<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SessionService;
use App\Filters\SessionFilters;
use App\Models\School;
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
     */
    public function show(Request $request, SessionFilters $filters, int $id) {
        $session = $this->service()->repo()->session($id, $filters);
        $this->authorize('view', $session);
        return $session;
    }

    /**
     * Get Sessions
     */
    public function index(Request $request, SessionFilters $filters) {
        $sessions = $this->service()->repo()->sessions($request->user(), $filters);
        return $sessions;
    }

    /**
     * Delete Session
     */
    public function destroy(Request $request, int $id) {
        $session = $this->service()->repo()->session($id);
        $this->authorize('delete', $session); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Session
     */
    public function store(SessionRequest $request) {
        $session = $this->service()->repo()->create($request->all());
        return $this->json($session);
    }

    /**
     * Update Session
     */
    public function update(Request $request, int $id) {
        $session = $this->service()->repo()->session($id);
        $this->authorize('update', $session);
        $session = $this->service()->repo()->update($id, $request->all());
        return $this->json($session);
    }
}
