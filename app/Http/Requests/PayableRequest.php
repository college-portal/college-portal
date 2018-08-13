<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use CollegePortal\Models\Chargeable;
use CollegePortal\Models\User;

class PayableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user()->first();
        $chargeable = Chargeable::findOrFail($this->input('chargeable_id'));
        $studentUser = $this->user_id ? User::findOrFail($this->user_id) : null;
        $school = $chargeable->school()->first();
        return $user->can('view', $school) && 
                ($this->user_id ? $user->can('update', $studentUser) : true);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'chargeable_id' => 'required|numeric|exists:chargeables,id',
            'user_id' => 'numeric|exists:users,id'
        ];
    }
}
