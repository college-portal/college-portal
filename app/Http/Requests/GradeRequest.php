<?php

namespace App\Http\Requests;

use App\Models\Grade;
use App\Models\Role;
use App\Models\StudentTakesCourse;
use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user()->first();
        $studentCourse = StudentTakesCourse::findOrFail($this->input('student_takes_course_id'));
        $course = $studentCourse->course()->first();

        return  $user->hasRole(Role::ADMIN) // administrator
                    ||
                (
                    ($user->id == $studentCourse->staff()->first()->user_id) || // user is student
                    ($user->id == $studentCourse->school()->first()->owner_id) || // school owner
                    ($user->id == $course->faculty()->first()->dean()->first()->user()->first()->id) || // dean of faculty
                    ($user->id == $course->department()->first()->hod()->first()->user()->first()->id) // hod of department
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
            'student_takes_course_id' => 'required|numeric|exists:student_takes_courses,id',
            'score' => 'required|numeric',
            'description' => 'required|string'
        ];
    }
}
