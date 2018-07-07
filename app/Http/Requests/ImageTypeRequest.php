<?php

namespace App\Http\Requests;

use App\Models\School;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class ImageTypeRequest extends FormRequest
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
            'name' => 'required|string'
        ];
    }
}
