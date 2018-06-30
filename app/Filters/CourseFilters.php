<?php

namespace App\Filters;

use App\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CourseFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_dependencies() {
        return $this->builder->with('dependencies');
    }
}