<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use CollegePortal\Models\School;
use CollegePortal\Models\Role;

class SessionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user()->first();
        $school = School::findOrFail($this->input('school_id'));
        return $user->can('update', $school);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school_id' => 'required|numeric|exists:schools,id',
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ];
    }
}
