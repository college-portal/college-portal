<?php

namespace App\Filters;

use App\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DepartmentFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_faculty() {
        return $this->builder->with('faculty');
    }

    public function with_hod() {
        return $this->builder->with('hod');
    }
}