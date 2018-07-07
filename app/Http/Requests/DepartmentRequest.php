<?php

namespace App\Http\Requests;

use App\Models\Faculty;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $faculty = Faculty::findOrFail($this->input('faculty_id'));
        $user = auth()->user()->first();
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $faculty->dean()->first()->user()->first()->id) || // dean of school
                ($user->id == $faculty->school()->first()->owner_id); // school owner
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
            'hod_id' => 'required|numeric|exists:staff,id',
            'faculty_id' => 'required|numeric|exists:faculties,id',
        ];
    }
}
