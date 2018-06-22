<?php

namespace App\Http\Requests;

use App\Models\Chargeable;
use App\Models\ChargeableService;
use Illuminate\Foundation\Http\FormRequest;

class ChargeableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $service = ChargeableService::findOrFail($this->input('chargeable_service_id'));
        $owner = $service->owner($this->chargeable_id)->first();
        $user = auth()->user();
        return $user->can('update', $service) && $user->can('update', $owner); // school owner
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'chargeable_service_id' => 'required|numeric|exists:chargeable_services,id',
            'chargeable_id'         => 'required|numeric',
            'amount'                => 'numeric'
        ];
    }
}
