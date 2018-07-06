<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Department;
use App\Models\SemesterType;
use App\Models\Level;

class CourseRequest extends FormRequest
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
        $semester_type = SemesterType::findOrFail($this->input('semester_type_id'));
        $level = Level::findOrFail($this->input('level_id'));
        return (
                    $user->can('view', $department) && 
                    $user->can('view', $level) &&
                    $user->can('view', $semester_type)
                ) &&
                (
                    $user->hasRole('administrator') || 
                    ($user->id == $department->hod->first()->user()->first()->id) || // department hod
                    ($user->staff()->where('id', $department->faculty()->first()->dean()->first()->id)->exists()) || // faculty dean
                    ($user->id == $department->faculty()->first()->school()->first()->owner_id) // school owner
                );
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
            'semester_type_id' => 'required|numeric|exists:semester_types,id',
            'level_id' => 'required|numeric|exists:levels,id',
            'code' => 'required|string',
            'title' => 'required|string',
            'credit' => 'required|numeric'
        ];
    }
}
