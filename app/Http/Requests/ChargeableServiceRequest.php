<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Models\School;
use App\Models\Chargeable;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ChargeableServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $school = School::findOrFail($this->input('school_id'));
        $user = auth()->user();
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
            'school_id'     => 'required|numeric|exists:schools,id',
            'type'          => [
                                'required',
                                'string',
                                Rule::in(Chargeable::ITEMS)
            ],
            'name'          => 'required|string',
            'description'   => 'string',
            'amount'        => 'required|numeric|min:0'
        ];
    }
}
