<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\School;
use App\Models\Department;
use App\Models\Role;
use App\User;

class StaffRequest extends FormRequest
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
        $school = School::findOrFail($this->input('school_id'));
        $department = Department::find($this->input('department_id'));

        return ($this->has('department_id') ? $user->can('update', $department) : true) && 
                $user->can('update', $school) &&
                $user->can('update', User::findOrFail($this->input('user_id')));
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
            'department_id' => 'numeric|nullable|exists:departments,id',
            'user_id' => 'required|numeric|exists:users,id',
            'title' => 'required|string'
        ];
    }
}
