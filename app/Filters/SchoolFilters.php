<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class SchoolFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_faculties():Builder
	{
        return $this->builder->with('faculties');
    }

    public function global():array
	{
        return [];
    }
}