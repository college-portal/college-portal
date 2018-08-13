<?php

namespace App\Filters;

use CollegePortal\Models\User;
use CollegePortal\Models\Department;
use Illuminate\Database\Eloquent\Builder;
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

    public function with_faculty():Builder
	{
        return $this->builder->with('faculty');
    }

    public function with_hod():Builder
	{
        return $this->builder->with('hod');
    }

    public function with_staff():Builder {
        return $this->builder->with('staff');
    }

    public function with_students():Builder {
        return $this->builder->with('students');
    }

    public function with_users():Builder {
        return $this->builder->with('users');
    }
}