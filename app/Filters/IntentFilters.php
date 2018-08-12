<?php

namespace App\Filters;

use CollegePortal\Models\User;
use CollegePortal\Models\Intent;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IntentFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }
}