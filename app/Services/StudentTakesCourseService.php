<?php

namespace App\Services;

use App\Repositories\StudentRepository;
use App\Repositories\StaffTeachCourseRepository;
use App\Repositories\SemesterRepository;
use App\Repositories\StudentTakesCourseRepository;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class StudentTakesCourseService
{
    private $studentRepository, $staffTeachCourseRepository, $semesterRepository;

    public function __construct(StudentRepository $studentRepository, 
                                StaffTeachCourseRepository $staffTeachCourseRepository, 
                                SemesterRepository $semesterRepository) {
        $this->studentRepository = $studentRepository;
        $this->staffTeachCourseRepository = $staffTeachCourseRepository;
        $this->semesterRepository = $semesterRepository;
    }

    public function repo()
    {
        return app(StudentTakesCourseRepository::class);
    }

    public function create ($opts) {
        // get the current user
        $user = auth()->user()->first();
        
        return $this->repo()->create($opts);
    }

    public function update ($id, $opts = []) {
        request()->validate([
            'student_id' => 'numeric|exists:students,id', 
            'staff_teach_course_id' => 'numeric|exists:staff_teach_courses,id'
        ]);

        // get the current user
        $user = auth()->user()->first();

        $studentCourse = $this->repo()->single($id);


        $student = $this->studentRepository->student(isset($opts['student_id']) ? $opts['student_id'] : $studentCourse->student_id);
        $staffCourse = $this->staffTeachCourseRepository->single(isset($opts['staff_teach_course_id']) ? $opts['staff_teach_course_id'] : $studentCourse->staff_teach_course_id);
        $school = $staffCourse->school()->first();

        if (($student->school()->first()->id != $school->id)) {
            throw ValidationException::withMessages([
                'student_id' => 'mismatched schools for student, and staff-course',
                'staff_teach_course_id' => 'mismatched schools for student, staff-course'
            ]);
        }

        return $this->repo()->update($id, $opts);
    }
}