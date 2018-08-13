<?php

namespace App\Http\Requests;

use CollegePortal\Models\Role;
use CollegePortal\Models\School;
use Illuminate\Foundation\Http\FormRequest;

class GradeTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->validate($this->rules());
        $school = School::findOrFail($this->route('school_id'));
        $user = auth()->user()->first();
        return $user->hasRole(Role::ADMIN) || 
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
            'name' => 'required|string',
            'value' => 'required|numeric|min:0|max:100',
            'minimum' => 'required|numeric|min:0|max:100',
            'maximum' => 'required|numeric|min:0|max:100'
        ];
    }
}
