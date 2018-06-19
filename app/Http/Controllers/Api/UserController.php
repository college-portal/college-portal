<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Filters\UserFilters;
use App\Http\Requests\UserRequest;

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
        $user = $this->service()->repo()->user($id);
        $this->authorize('delete', $user); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(UserRequest $request) {
        $user = $this->service()->repo()->create($request->all());
        return $this->json($user);
    }

    public function update(Request $request, $id) {
        $user = $this->service()->repo()->user($id);
        $this->authorize('update', $user);
        $user = $this->service()->repo()->update($id, $request->all());
        return $this->json($user);
    }
}
