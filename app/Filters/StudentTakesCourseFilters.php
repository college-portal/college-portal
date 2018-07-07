<?php

namespace App\Filters;

use App\User;
use App\Models\StudentTakesCourse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentTakesCourseFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_student() {
        return $this->builder->with('student');
    }

    public function with_staff_courses() {
        return $this->builder->with('staffCourses');
    }

    public function with_semester() {
        return $this->builder->with('semester');
    }

    public function with_staff() {
        return $this->builder->with('staff');
    }

    public function with_course() {
        return $this->builder->with('course');
    }

    public function with_school() {
        return $this->builder->with('school');
    }
}