<?php

namespace App\Http\Requests;

use App\Models\School;
use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $school = School::findOrFail($this->route('school_id'));
        $user = auth()->user();
        return $user->hasRole('admin') || 
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
            'name' => 'required|string'
        ];
    }
}
