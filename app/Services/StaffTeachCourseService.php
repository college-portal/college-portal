<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\SemesterRepository;
use App\Repositories\StaffTeachCourseRepository;
use Carbon\Carbon;

class StaffTeachCourseService
{
    private $semesterRepository, $courseRepository;

    public function __construct(SemesterRepository $semesterRepository, CourseRepository $courseRepository) {
        $this->semesterRepository = $semesterRepository;
        $this->courseRepository = $courseRepository;
    }

    public function repo()
    {
        return app(StaffTeachCourseRepository::class);
    }

    public function create ($opts) {
        // get the current user
        $user = auth()->user()->first();

        // get the relevant models
        $course = $this->courseRepository->course($opts['course_id']);
        $semester = $this->semesterRepository->semester($opts['semester_id']);

        // confirm that the selected course is in the selected semester type
        if (($semester->semester_type_id != $course->semester_type_id)) {
            throw ValidationException::withMessages([
                'semester_id' => 'semester_type_id not matching with that of selected course',
                'course_id' => 'semester_type_id not matching with that of selected semester'
            ]);
        }
        
        return $this->repo()->create($opts);
    }
}