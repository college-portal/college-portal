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

    public function show(Request $request, InviteFilters $filters, $id) {
        $invite = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $invite); /** ensure the current user has view rights */
        return $invite;
    }

    public function index(Request $request, InviteFilters $filters) {
        $invites = $this->service()->repo()->list($request->user(), $filters);
        return $invites;
    }

    public function destroy(Request $request, $id) {
        $invite = $this->service()->repo()->single($id);
        $this->authorize('delete', $invite); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(InviteRequest $request) {
        $invite = $this->service()->create(array_merge([ 'creator_id' => $request->user()->id ], $request->all()));
        return $this->created($invite);
    }

    public function update(Request $request, $id) {
        $invite = $this->service()->repo()->single($id);
        $this->authorize('update', $invite);
        $invite = $this->service()->resolve($id);
        return $this->json($invite);
    }
}
