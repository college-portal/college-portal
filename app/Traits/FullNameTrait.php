<?php

namespace App\Traits;

trait FullNameTrait
{
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords($value);
        $this->display_name             = $this->name;
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords($value);
        $this->display_name            = $this->name;
    }

    public function setOtherNamesAttribute($value)
    {
        $this->attributes['other_names'] = $value;
        $this->display_name            = $this->name;
    }

    public function getNameAttribute() {
        $firstName = ucwords(strtolower($this->first_name));
        $lastName  = ucwords(strtolower($this->last_name));
        $otherNames  = $this->other_names ? (ucwords(strtolower($this->other_names)) + ' ') : '';

        return "$firstName ${otherNames}$lastName";
    }
}
