<?php

namespace App\Filters;

use App\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProgramFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_department() {
        return $this->builder->with('department');
    }
}