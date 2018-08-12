<?php

namespace App\Http\Requests;

use CollegePortal\Models\Role;
use CollegePortal\Models\ContentType;
use App\Rules\AbsentRule;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
        $type = ContentType::findOrFail($this->input('content_type_id'));
        $owner = $type->owner($this->owner_id)->first();
        if (!$owner) {
            throw ValidationException::withMessages([
                'owner_id' => "No $type->type with id $this->owner_id found"
            ]);
        }
        return $user->can('view', $type) && $user->can('update', $owner);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'owner_id' => 'required|numeric',
            'content_type_id' => 'required|numeric|exists:content_types,id',
            'value' => 'required|string'
        ];
    }
}
