<?php

namespace App\Filters;

use App\User;
use App\Models\ChargeableService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChargeableServiceFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function school($value) {
        return $this->builder->where('school_id', $value);
    }

    public function with_school() {
        return $this->builder->with('school');
    }

    public function with_chargeables() {
        return $this->builder->with('chargeables');
    }
}