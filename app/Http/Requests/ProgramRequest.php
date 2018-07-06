<?php

namespace App\Http\Requests;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $department = Department::findOrFail($this->input('department_id'));
        $user = auth()->user()->first();
        return $user->hasRole(Role::ADMIN) || 
                ($user->id == $department->hod->first()->user()->first()->id) || // department hod
                ($user->staff()->where('id', $department->faculty()->first()->dean()->first()->id)->exists()) || // faculty dean
                ($user->id == $department->faculty()->first()->school()->first()->owner_id); // school owner
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
            'department_id' => 'required|numeric|exists:departments,id',
        ];
    }
}
