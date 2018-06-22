<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Auth\Access\AuthorizationException;

trait AuthorizableTrait
{
    /**
     * Authorize a given action for a user.
     *
     * @param  mixed  $ability
     * @param  mixed|array  $arguments
     * @return \Illuminate\Auth\Access\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function authorize($ability, $arguments = [])
    {
        if (!$this->can($ability, $arguments)) {
            throw new AuthorizationException('not authorized');
        }
    }
}