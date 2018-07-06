<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Models\Program;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $program = Program::findOrFail($this->input('program_id'));
        $department = $program->department()->first();
        $faculty = $department->faculty()->first();
        $school = $faculty->school()->first();
        $user = auth()->user()->first();
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $department->hod()->first()->user()->first()->id) || // hod of department
                ($user->id == $faculty->dean()->first()->user()->first()->id) || // dean of faculty
                ($user->id == $school->owner_id); // school owner
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|numeric|exists:users,id',
            'program_id' => 'required|numeric|exists:programs,id',
            'matric_no' => 'required|string'
        ];
    }
}
