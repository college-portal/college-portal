<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SessionFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function school_id(string $value):Builder
	{
        return $this->builder->where('school_id', $value);
    }

    public function global():array
	{
        return [];
    }
}