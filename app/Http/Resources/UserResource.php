<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return array_merge([
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'display_name' => $this->display_name,
            'dob' => $this->dob,
            'created_at' => $this->created_at->format('c'),
            'updated_at' => $this->updated_at->format('c'),
        ], 
        ($request->has('with_staff') ? [
            'staff' => $this->staff
        ] : []), 
        ($request->has('with_students') ? [
            'students' => $this->students
        ] : []));
    }
}
