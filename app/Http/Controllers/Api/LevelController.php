<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\LevelService;
use App\Filters\LevelFilters;
use CollegePortal\Models\School;
use App\Http\Requests\LevelRequest;

/**
 * @resource Levels
 *
 * For Endpoints handling Levels, which represent a year within the school system.
 */
class LevelController extends ApiController
{
    protected $service;

    public function __construct(LevelService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Level by ID
     * 
     * Responds with a specific Level by its ID
     * - Rules of Access
     *   - User is in the same school
     */
    public function show(Request $request, LevelFilters $filters, int $school_id, int $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $level = $this->service()->repo()->level($id, $filters);
        $this->authorize('view', $level);
        return $level;
    }

    /**
     * Get Levels
     * 
     * Responds with a list of Levels
     * - Rules of Access
     *   - User is in the same school
     */
    public function index(Request $request, LevelFilters $filters, int $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $levels = $this->service()->repo()->levels($request->user(), $filters);
        return $levels;
    }

    /**
     * Delete Level
     * 
     * Removes a Level from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Level belongs to
     */
    public function destroy(Request $request, int $school_id, int $id) {
        $this->authorize('update', School::findOrFail($school_id));
        $level = $this->service()->repo()->level($id);
        $this->authorize('delete', $level); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Level
     * 
     * Supply Level information to create a new one
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Level belongs to
     */
    public function store(LevelRequest $request, int $school_id) {
        $this->authorize('update', School::findOrFail($school_id));
        $level = $this->service()->repo()->create(array_merge($request->all(), [ 'school_id' => $school_id ]));
        return $this->created($level);
    }

    /**
     * Update Level
     * 
     * Modify information about an existing Level by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Level belongs to
     */
    public function update(Request $request, int $school_id, int $id) {
        $this->authorize('update', School::findOrFail($school_id));
        $level = $this->service()->repo()->level($id);
        $this->authorize('update', $level);
        $level = $this->service()->repo()->update($id, $request->all());
        return $this->json($level);
    }
}
