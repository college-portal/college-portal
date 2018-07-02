<?php

namespace App\Http\Requests;

use App\Models\Chargeable;
use App\Models\ChargeableService;
use Illuminate\Validation\Rule;
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
        $owner = $service->owner($this->owner_id)->first();
        $user = auth()->user();
        return $user->can('view', $service) && $user->can('update', $owner); // school owner
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
            'owner_id'              => [
                                        'required',
                                        'numeric',
                                        Rule::unique('chargeables')->where(function ($q) {
                                            return $q->where('owner_id', $this->owner_id)->where('chargeable_service_id', $this->chargeable_service_id);
                                        })
                                       ],
            'amount'                => 'numeric'
        ];
    }
}
