<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Filters\UserFilters;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;

/**
 * @resource Users
 *
 * For Endpoints handling Users, which represent a registered user of the system
 */
class UserController extends ApiController
{
    protected $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get User by ID
     * 
     * Responds with a specific User by its ID
     * - Rules of Access
     *   - User is same school
     * - Filters
     *   - ?with_staff
     *   - ?with_students
     */
    public function show(Request $request, UserFilters $filters, int $id) {
        $user = $this->service()->repo()->user($id, $filters);
        $this->authorize('view', $user); /** ensure the current user has view rights */
        return $user;
    }

    /**
     * Get Users
     * 
     * Responds with a list of Users
     * - Rules of Access
     *   - User is same school
     * - Filters
     *   - ?with_staff
     *   - ?with_students
     */
    public function index(Request $request, UserFilters $filters) {
        $users = $this->service()->repo()->users($request->user(), $filters);
        return $users;
    }

    /**
     * Delete User
     * 
     * Removes a User from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User is deleting his/her own account
     */
    public function destroy(Request $request, int $id) {
        $user = $this->service()->repo()->user($id);
        $this->authorize('delete', $user); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create User
     * 
     * Supply User information to create a new one
     */
    public function store(UserRequest $request) {
        $user = $this->service()->create($request->all());
        return $this->created($user);
    }

    /**
     * Update User
     * 
     * Modify information about an existing User by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User is updating his/her own account
     */
    public function update(Request $request, int $id) {
        $user = $this->service()->repo()->user($id);
        $this->authorize('update', $user);
        $user = $this->service()->repo()->update($id, $request->all());
        return $this->json($user);
    }
}
