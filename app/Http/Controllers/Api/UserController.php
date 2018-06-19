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

    public function index(Request $request, UserFilters $filters) {
        return $this->service()->repo()->users($request->user(), $filters);
    }
}
