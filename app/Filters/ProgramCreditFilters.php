<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ProgramCreditFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }
}