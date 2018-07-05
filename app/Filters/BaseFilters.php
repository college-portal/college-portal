<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BaseFilters
{
    protected $request;
    protected $builder;
    protected $functions;
  
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->functions = new Collection();
    }
  
    public function apply(Builder $builder):Builder
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
  
    public function filters():array
    {
        return $this->request->all();
    }
    
    public function global():array
	{
        return [];
    }

    protected function defer($function) {
        $this->functions->push($function);
    }

    public function transform($model) {
        $this->functions->each(function ($function) use ($model) {
            $model = $function($model);
        });
        return $model;
    }
}