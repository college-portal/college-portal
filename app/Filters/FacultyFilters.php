<?php

namespace App\Filters;

use CollegePortal\Models\User;
use CollegePortal\Models\Faculty;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FacultyFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_departments():Builder
	{
        return $this->builder->with('departments');
    }

    public function with_programs():Builder
	{
        return $this->builder->with('programs');
    }

    public function with_students():Builder
	{
        return $this->builder->with('students');
    }

    public function with_staff():Builder
	{
        return $this->builder->with('staff');
    }

    public function with_users():Builder
	{
        return $this->builder->with('users');
    }
}