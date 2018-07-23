<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Rules\AbsentRule;
use Illuminate\Foundation\Http\FormRequest;

class UserHasRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user()->first();
        $role = Role::findOrFail($this->role_id);
        return $role->isAdmin() ? 
                $user->hasRole(Role::ADMIN) : 
                (
                    $user->hasRole(Role::ADMIN) || $user->hasRole(Role::SCHOOL_OWNER, $this->school_id)
                );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|numeric|exists:users,id',
            'role_id' => 'required|numeric|exists:roles,id',
            'school_id' => 'numeric|exists:schools,id',
            'created_at' => [ new AbsentRule() ],
            'updated_at' => [ new AbsentRule() ]
        ];
    }
}
