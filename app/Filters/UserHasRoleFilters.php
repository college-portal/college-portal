<?php

namespace App\Filters;

use App\User;
use App\Models\UserHasRole;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserHasRoleFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }
}