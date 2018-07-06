<?php

namespace App\Filters;

use App\User;
use App\Models\CourseDependency;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CourseDependencyFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function course($id) {
        return $this->builder->where('course_id', $id);
    }

    public function dependency($id) {
        return $this->builder->where('dependency_id', $id);
    }

    public function with_course() {
        return $this->builder->with('course');
    }

    public function with_dependency() {
        return $this->builder->with('dependency');
    }
}