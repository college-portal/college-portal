<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProgramCreditService;
use App\Filters\ProgramCreditFilters;
use App\Http\Requests\ProgramCreditRequest;

class ProgramCreditController extends ApiController
{
    protected $service;

    public function __construct(ProgramCreditService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, ProgramCreditFilters $filters, int $id) {
        $credit = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $credit); /** ensure the current user has view rights */
        return $credit;
    }

    public function index(Request $request, ProgramCreditFilters $filters) {
        $credits = $this->service()->repo()->list($request->user(), $filters);
        return $credits;
    }

    public function destroy(Request $request, int $id) {
        $credit = $this->service()->repo()->single($id);
        $this->authorize('delete', $credit); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    public function store(ProgramCreditRequest $request) {
        $credit = $this->service()->repo()->create($request->all());
        return $this->json($credit);
    }

    public function update(Request $request, int $id) {
        $credit = $this->service()->repo()->single($id);
        $this->authorize('update', $credit);
        $credit = $this->service()->update($id, $request->all());
        return $this->json($credit);
    }
}
