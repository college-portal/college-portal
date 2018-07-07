<?php

namespace App\Filters;

use App\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CourseFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_dependencies() {
        return $this->builder->with('dependencies');
    }

    public function with_staff() {
        return $this->builder->with('staff');
    }

    public function with_department() {
        return $this->builder->with('department');
    }

    public function with_semester_type() {
        return $this->builder->with('semesterType');
    }

    public function with_level() {
        return $this->builder->with('level');
    }

    public function with_school() {
        return $this->defer(function ($course) {
            $course->school = $course->school()->first();
            return $course;
        });
    }

    public function with_faculty() {
        return $this->defer(function ($course) {
            $course->faculty = $course->faculty()->first();
            return $course;
        });
    }
}