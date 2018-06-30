<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Course;
use App\Models\CourseDependency;

class CourseDependencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->validate($this->rules());
        $user = auth()->user();
        $course = Course::findOrFail($this->input('course_id'));
        $dependency = Course::findOrFail($this->input('dependency_id'));
        return $user->can('update', $course) && $user->can('update', $dependency);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_id' => 'required|numeric|exists:courses,id|different:dependency_id',
            'dependency_id' => 'required|numeric|exists:courses,id|different:course_id',
        ];
    }
}
