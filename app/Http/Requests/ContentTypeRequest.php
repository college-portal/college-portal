<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Models\School;
use App\Rules\AbsentRule;
use Illuminate\Foundation\Http\FormRequest;

class ContentTypeRequest extends FormRequest
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
            'type' => 'required|string',
            'name' => 'required|string',
            'display_name' => 'required|string',
            'school_id' => [ new AbsentRule() ]
        ];
    }
}
