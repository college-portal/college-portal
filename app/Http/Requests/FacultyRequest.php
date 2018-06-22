<?php

namespace App\Http\Requests;

use App\Models\School;
use Illuminate\Foundation\Http\FormRequest;

class FacultyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $school = School::findOrFail($this->input('school_id'));
        $user = auth()->user();
        return $user->hasRole('administrator') || ($user->id == $school->owner_id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'school_id' => 'required|numeric|exists:schools,id',
            'dean_id'   => 'required|numeric|exists:staff,id' 
        ];
    }
}
