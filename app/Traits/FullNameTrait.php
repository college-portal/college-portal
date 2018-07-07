<?php

namespace App\Traits;

trait FullNameTrait
{
    /**
     * Executed when the first_name property is set
     * 
     * @param string $value
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords($value);
        $this->display_name             = $this->name;
    }

    /**
     * Executed when the last_name property is set
     * 
     * @param string $value
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords($value);
        $this->display_name            = $this->name;
    }

    /**
     * Executed when the other_names property is set
     * 
     * @param string $value
     */
    public function setOtherNamesAttribute($value)
    {
        $this->attributes['other_names'] = $value;
        $this->display_name            = $this->name;
    }

    /**
     * serves the name property which consists of first_name, last_name and other_names
     * 
     * @param string $value
     */
    public function getNameAttribute() {
        $firstName = ucwords(strtolower($this->first_name));
        $lastName  = ucwords(strtolower($this->last_name));
        $otherNames  = $this->other_names ? (ucwords(strtolower($this->other_names)) + ' ') : '';

        return "$firstName ${otherNames}$lastName";
    }
}
