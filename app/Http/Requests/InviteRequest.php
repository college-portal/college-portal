<?php

namespace App\Http\Requests;

use CollegePortal\Models\Role;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Http\FormRequest;

class InviteRequest extends FormRequest
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

        $roleIds = new Collection();
        if (isset($this->role_id)) {
            $roleIds->push($this->role_id);
        }
        else if (isset($this->roles) && is_array($this->roles)) {
            $roleIds = (new Collection($this->roles))->map(function ($data) { 
                return $data['role_id']; 
            });
        }
        else return false;

        return $roleIds->reduce(function ($carry, $role_id) use ($user) {
            $role = Role::findOrFail($role_id);
            return $carry && (
                                $role->isAdmin() ? 
                                $user->hasRole(Role::ADMIN) : 
                                (
                                    ($role->name == Role::SCHOOL_OWNER) ?
                                        (
                                            $user->hasRole(Role::ADMIN) || 
                                            $user->hasRole(Role::SCHOOL_OWNER, $this->school_id)
                                        ) :
                                        (
                                            $user->hasRole(Role::INVITE_CREATOR)
                                        )
                                )
                            );
        }, true);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:invites,email',
            'role_id' => 'required_without:roles|numeric|exists:roles,id',
            'roles' => 'required_without:role_id|array|distinct',
            'roles.*.role_id' => 'required|numeric|exists:roles,id',
            'roles.*.extras' => 'array',
            'school_id' => 'numeric|exists:schools,id',
            'message' => 'required|string'
        ];
    }
}
