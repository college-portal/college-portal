<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FacultyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this['faculty_id'],
            'school_id' => $this->school_id,
            'dean_id' => $this->dean_id,
            'name' => $this['faculty_name']
        ];
    }
}
