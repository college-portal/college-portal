<?php

namespace App\Http\Requests;

use CollegePortal\Models\Role;
use CollegePortal\Models\School;
use CollegePortal\Models\Session;
use CollegePortal\Models\Program;
use App\Rules\AbsentRule;
use Illuminate\Foundation\Http\FormRequest;

class ProspectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->validate($this->rules());
        $school = School::findOrFail($this->input('school_id'));
        $session = Session::findOrFail($this->input('session_id'));
        $program = Program::findOrFail($this->input('program_id'));
        $user = auth()->user()->first();
        return ($session->school_id == $school->id) && 
                ($program->school()->first()->id == $school->id) && 
                ($user->hasRole(Role::ADMIN) || $user->hasRole(Role::SCHOOL_OWNER, $school->id));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => [ new AbsentRule() ],
            'school_id' => 'required|numeric|exists:schools,id',
            'program_id' => 'required|numeric|exists:programs,id',
            'session_id' => 'required|numeric|exists:sessions,id',
            'locked_at' => [ new AbsentRule() ],
            'accepted_at' => [ new AbsentRule() ]
        ];
    }
}
