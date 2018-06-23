<?php

namespace App\Http\Requests;

use App\Models\Program;
use App\Models\Semester;
use App\Models\Level;
use Illuminate\Foundation\Http\FormRequest;

class ProgramCreditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user()->first();
        $program = Program::findOrFail($this->input('program_id'));
        $semester = Semester::findOrFail($this->input('semester_id'));
        $level = Level::findOrFail($this->input('level_id'));

        return $user->can('update', $program) && 
                $user->can('update', $semester) && 
                $user->can('update', $level);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'program_id'    => 'required|numeric|exists:programs,id',
            'semester_id'   => 'required|numeric|exists:semesters,id',
            'level_id'      => 'required|numeric|exists:levels,id',
            'credit'        => 'required|numeric'
        ];
    }
}
