<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\School;
use App\Models\SemesterType;

class SemesterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user();
        $type = SemesterType::findOrFail($this->input('semester_type_id'));
        return $user->can('update', $type);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'session_id' => 'numeric|exists:sessions,id',
            'semester_type_id' => 'required|numeric|exists:semester_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ];
    }
}
