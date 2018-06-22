<?php

namespace App\Filters;

use App\User;
use App\Models\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SessionFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function school_id($value) {
        return $this->builder->where('school_id', $value);
    }

    public function global() {
        return [];
    }
}