<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BaseFilters
{
    protected $request;
    protected $builder;
  
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
  
    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        foreach (array_merge($this->global(), $this->filters()) as $name => $value) {
            if ( ! method_exists($this, $name)) {
                continue;
            }
            if (strlen($value)) {
                $this->$name($value);
            } else {
                $this->$name();
            }
        }
        return $this->builder;
    }
  
    public function filters(): array
    {
        return $this->request->all();
    }
    
    public function global() {
        return [];
    }
}