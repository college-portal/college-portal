<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Student;
use App\Models\StaffTeachCourse;
use App\Models\Semester;
use App\Models\Role;

class StudentTakesCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->validate($this->rules());
        $user = auth()->user()->first();
        $student = Student::findOrFail($this->input('student_id'));
        $staffCourse = StaffTeachCourse::findOrFail($this->input('staff_teach_course_id'));
        $semester = Semester::findOrFail($this->input('semester_id'));

        $school = $semester->school()->first();

        return  (
                    ($student->school()->first()->id == $school->id) &&
                    ($staffCourse->school()->first()->id == $school->id)
                )
                &&
                (
                    $user->hasRole(Role::ADMIN) || 
                    $user->hasRole([ 
                        Role::SCHOOL_OWNER, 
                        Role::DEAN, 
                        Role::HOD 
                    ], $school->id) ||
                    ($user->id == $student->user_id)
                );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_id' => 'required|numeric|exists:students,id', 
            'staff_teach_course_id' => 'required|numeric|exists:staff_teach_courses,id', 
            'semester_id' => 'required|numeric|exists:semesters,id'
        ];
    }
}
