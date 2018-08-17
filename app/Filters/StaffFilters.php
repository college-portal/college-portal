<?php

namespace App\Filters;

use Illuminate\Http\Request;

class StaffFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function department($id) {
        return $this->builder->where('department_id', $id);
    }
}