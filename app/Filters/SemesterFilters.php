<?php

namespace App\Filters;

use Illuminate\Http\Request;

class SemesterFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_session() {
        return $this->builder->with('session');
    }

    public function with_type() {
        return $this->builder->with('type');
    }
}