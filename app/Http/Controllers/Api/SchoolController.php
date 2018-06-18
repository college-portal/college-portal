<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SchoolService;
use App\Filters\SchoolFilters;

class SchoolController extends ApiController
{
    protected $service;

    public function __construct(SchoolService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function schools(Request $request, SchoolFilters $filters) {
        return $request->user()->schools()->filter($filters)->paginate();
    }
}
