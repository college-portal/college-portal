<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\InviteService;
use App\Filters\InviteFilters;
use App\Http\Requests\InviteRequest;

class InviteController extends ApiController
{
    protected $service;

    public function __construct(InviteService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Invite by ID
     * 
     * Responds with a specific Invite by its ID
     * - Rules of Access
     *   - User is an ADMIN
     *   - User owns school where Invite is made to
     *   - User has role of INVITE_CREATOR in school where Invite is made to
     *   - User created the Invite
     */
    public function show(Request $request, InviteFilters $filters, $id) {
        $invite = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $invite); /** ensure the current user has view rights */
        return $invite;
    }

    /**
     * Get Invites
     * 
     * Responds with a list of Invites the user has access to view
     * - Rules of Access
     *   - User is an ADMIN
     *   - User owns school where Invite is made to
     *   - User has role of INVITE_CREATOR in school where Invite is made to
     *   - User created the Invite
     */
    public function index(Request $request, InviteFilters $filters) {
        $invites = $this->service()->repo()->list($request->user(), $filters);
        return $invites;
    }

    /**
     * Delete Invite
     * 
     * Removes a Invite from the System by ID
     * - Rules of Access
     *   - User is an ADMIN
     *   - User owns school where Invite is made to
     *   - User has role of INVITE_CREATOR in school where Invite is made to
     *   - User created the Invite
     */
    public function destroy(Request $request, $id) {
        $invite = $this->service()->repo()->single($id);
        $this->authorize('delete', $invite); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Invite
     * 
     * Supply Invite information to create a new one
     * - Rules of Access
     *  - User can invite an ADMIN only if User is an ADMIN
     *  - User can invite a SCHOOL_OWNER if User is an ADMIN or SCHOOL_OWNER in same school
     *  - User can invite anyone else to a school if User is ADMIN / SCHOOL_OWNER / INVITE_CREATOR
     */
    public function store(InviteRequest $request) {
        $invite = $this->service()->create(array_merge([ 'creator_id' => $request->user()->id ], $request->all()));
        return $this->created($invite);
    }

    /**
     * Update Invite
     * 
     * Modify information about an existing Invite by ID
     * - Rules of Access
     *  - Invite was made to User's email address
     */
    public function update(Request $request, $id) {
        $invite = $this->service()->repo()->single($id);
        $this->authorize('update', $invite);
        $invite = $this->service()->resolve($id);
        return $this->json($invite);
    }
}
