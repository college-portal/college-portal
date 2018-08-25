<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_staff():Builder
	{
        return $this->builder->with('staff');
    }

    public function with_students():Builder
	{
        return $this->builder->with('students');
    }

    public function email_verified():Builder 
    {
        return $this->builder->whereHas('contents', function ($q) {
            return $q->whereHas('type', function ($q) {
                return $q->where('name', 'email_verified')->where('contents.value', 'true');
            });
        });
    }
}