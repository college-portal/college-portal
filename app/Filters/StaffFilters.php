<?php

namespace App\Filters;

use App\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StaffFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }
}