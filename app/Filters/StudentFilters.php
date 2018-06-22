<?php

namespace App\Filters;

use App\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function program_id ($value) {
        return $this->builder->where('program_id', $value);
    }

    public function matric_no ($value) {
        return $this->builder->where('matric_no', 'LIKE', "%$value%");
    }
}