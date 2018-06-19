<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Filters\UserFilters;

class UserController extends ApiController
{
    protected $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, $id) {
        $user = $this->service()->repo()->user($id);
        $this->authorize('view', $user); /** ensure the current user has view rights */
        return $user;
    }

    public function index(Request $request, UserFilters $filters) {
        return $this->service()->repo()->users($request->user(), $filters);
    }

    public function destroy(Request $request, $id) {
        $school = $this->service()->repo()->school($request->user(), $id);
        $this->authorize('delete', $school); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($request->user(), $id);
        return $this->ok();
    }

    public function store(SchoolRequest $request) {
        $school = $this->service()->repo()->create($request->user(), $request->all());
        return $this->json($school);
    }

    public function update(Request $request, $id) {
        $school = $this->service()->repo()->update($request->user(), $id, $request->all());
        $this->authorize('update', $school);
        return $this->json($school);
    }
}
