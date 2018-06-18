<?php

namespace App\Filters;

use App\User;
use App\Models\School;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SchoolFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function only_active() { /** unless include_inactive is specified */
        return $this->builder->where('is_active', true);
    }

    public function global() {
        if (!$this->request->has('include_inactive')) {
            $this->only_active();
        }
        return [];
    }
}