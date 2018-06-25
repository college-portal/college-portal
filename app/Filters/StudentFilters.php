<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class StudentFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function program_id(string $value):Builder
	{
        return $this->builder->where('program_id', $value);
    }

    public function matric_no(string $value):Builder
	{
        return $this->builder->where('matric_no', 'LIKE', "%$value%");
    }
}