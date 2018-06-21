<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Department;
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
        $user = auth()->user();
        $department = Department::findOrFail($this->input('department_id'));
        return $user->can('update', $department) && 
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
            'department_id' => 'required|numeric|exists:departments,id',
            'user_id' => 'required|numeric|exists:users,id',
            'title' => 'required|string'
        ];
    }
}
