<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\LevelService;
use App\Filters\LevelFilters;
use App\Models\School;
use App\Http\Requests\LevelRequest;

class LevelController extends ApiController
{
    protected $service;

    public function __construct(LevelService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, LevelFilters $filters, $school_id, $id) {
        $this->authorize('view', School::findOrFail($school_id));
        return $this->service()->repo()->level($id, $filters);
    }

    public function index(Request $request, LevelFilters $filters, $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $levels = $this->service()->repo()->levels($request->user(), $filters);
        return $levels;
    }

    public function destroy(Request $request, $school_id, $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $level = $this->service()->repo()->level($id);
        $this->authorize('delete', $level); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(LevelRequest $request, $school_id) {
        $this->authorize('view', School::findOrFail($school_id));
        $level = $this->service()->repo()->create(array_merge($request->all(), [ 'school_id' => $school_id ]));
        return $this->json($level);
    }

    public function update(Request $request, $school_id, $id) {
        $this->authorize('view', School::findOrFail($school_id));
        $level = $this->service()->repo()->level($id);
        $this->authorize('update', $level);
        $level = $this->service()->repo()->update($id, $request->all());
        return $this->json($level);
    }
}
