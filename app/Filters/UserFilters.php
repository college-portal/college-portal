<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_staff() {
        return $this->builder->with('staff');
    }

    public function with_students() {
        return $this->builder->with('students');
    }

    public function global() {
        return [];
    }
}