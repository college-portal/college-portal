<?php

namespace App\Filters;

use CollegePortal\Models\User;
use CollegePortal\Models\Grade;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GradeFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_student() {
        return $this->defer(function ($grade) {
            $grade->student = $grade->student()->first();
        });
    }

    public function with_staff() {
        return $this->defer(function ($grade) {
            $grade->staff = $grade->staff()->first();
        });
    }

    public function with_course() {
        return $this->defer(function ($grade) {
            $grade->course = $grade->course()->first();
        });
    }

    public function with_school() {
        return $this->defer(function ($grade) {
            $grade->school = $grade->school()->first();
        });
    }

    public function with_user() {
        return $this->defer(function ($grade) {
            $grade->user = $grade->user()->first();
        });
    }

    public function with_total() {
        return $this->defer(function ($grade) {
            $grade->total = $grade->total();
        });
    }
}