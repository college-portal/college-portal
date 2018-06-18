<?php

namespace App\Traits;

use App\Filters\BaseFilters;
use Illuminate\Database\Eloquent\Builder;

trait FilterableTrait
{
    public function scopeFilter($query, BaseFilters $filters)
    {
        return $filters->apply($query);
    }
}