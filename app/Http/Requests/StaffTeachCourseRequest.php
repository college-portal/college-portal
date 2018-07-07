<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Course;
use App\Models\Staff;
use App\Models\Role;

class StaffTeachCourseRequest extends FormRequest
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
        $staff = Staff::findOrFail($this->input('staff_id'));
        $course = Course::findOrFail($this->input('course_id'));

        $school = $staff->school()->first();

        return (
                $user->hasRole(Role::ADMIN) || 
                $user->hasRole([ 
                        Role::SCHOOL_OWNER, 
                        Role::DEAN, 
                        Role::HOD 
                    ], $school->id)
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
            'staff_id' => 'required|numeric|exists:staff,id',
            'course_id' => 'required|numeric|exists:courses,id'
        ];
    }
}
