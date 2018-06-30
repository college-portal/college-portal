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

        // get the relevant models
        $student = $this->studentRepository->student($opts['student_id']);
        $staffCourse = $this->staffTeachCourseRepository->single($opts['staff_teach_course_id']);
        $semester = $this->semesterRepository->semester($opts['semester_id']);
        $school = $semester->school()->first();

        // confirm that the selected course is in the selected semester type
        if (($semester->semester_type_id != $staffCourse->course()->first()->semester_type_id)) {
            throw ValidationException::withMessages([
                'semester_id' => 'semester_type_id not matching with that of selected course',
                'staff_teach_course_id' => 'semester_type_id not matching with that of selected semester'
            ]);
        }
        
        return $this->repo()->create($opts);
    }

    public function update ($id, $opts = []) {
        request()->validate([
            'student_id' => 'numeric|exists:students,id', 
            'staff_teach_course_id' => 'numeric|exists:staff_teach_courses,id', 
            'semester_id' => 'numeric|exists:semesters,id'
        ]);

        // get the current user
        $user = auth()->user()->first();

        $studentCourse = $this->repo()->single($id);


        $student = $this->studentRepository->student(isset($opts['student_id']) ? $opts['student_id'] : $studentCourse->student_id);
        $staffCourse = $this->staffTeachCourseRepository->single(isset($opts['staff_teach_course_id']) ? $opts['staff_teach_course_id'] : $studentCourse->staff_teach_course_id);
        $semester = $this->semesterRepository->semester(isset($opts['semester_id']) ? $opts['semester_id'] : $studentCourse->semester_id);
        $school = $semester->school()->first();

        if (!($student->school()->first()->id == $school->id) &&
            ($staffCourse->school()->first()->id == $school->id)) {
            throw ValidationException::withMessages([
                'student_id' => 'mismatched schools for student, staff-course and semester',
                'staff_teach_course_id' => 'mismatched schools for student, staff-course and semester',
                'semester_type_id' => 'mismatched schools for student, staff-course and semester'
            ]);
        }
        // confirm that the selected course is in the selected semester type
        else if (($semester->semester_type_id != $staffCourse->course()->first()->semester_type_id)) {
            throw ValidationException::withMessages([
                'semester_id' => 'semester_type_id not matching with that of selected course',
                'staff_teach_course_id' => 'semester_type_id not matching with that of selected semester'
            ]);
        }

        return $this->repo()->update($id, $opts);
    }
}