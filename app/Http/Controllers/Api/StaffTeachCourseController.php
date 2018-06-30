<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\StaffTeachCourseService;
use App\Filters\StaffTeachCourseFilters;
use App\Http\Requests\StaffTeachCourseRequest;

class StaffTeachCourseController extends ApiController
{
    protected $service;

    public function __construct(StaffTeachCourseService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function show(Request $request, StaffTeachCourseFilters $filters, $id) {
        //$this->authorize('view'); /** ensure the current user has view rights */
        return $this->ok();
    }

    public function index(Request $request, StaffTeachCourseFilters $filters) {
        return [];
    }

    public function destroy(Request $request, $id) {
        //$this->authorize('delete'); /** ensure the current user has delete rights */
        return $this->ok();
    }

    public function store(StaffTeachCourseRequest $request) {
        return $this->ok();
    }

    public function update(Request $request, $id) {
        return $this->ok();
    }
}
