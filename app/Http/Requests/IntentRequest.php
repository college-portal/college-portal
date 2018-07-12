<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntentRequest extends FormRequest
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
        return $this->user_id ? 
                (($user->id != $this->user_id) ? $user->hasRole(Role::ADMIN) : false) : true;
                 // must be admin if user_id is supplied
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'numeric|exists:users,id',
            'intent_type_id' => 'numeric|exists:intent_types,id',
            'intent_type' => 'string|exists:intent_types,name',
        ];
    }
}
