<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\ContentType;
use Carbon\Carbon;

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
        return $this;
    }

    public function transform($model) {
        return $this->functions->reduce(function ($model, $function) {
            return $function($model);
        }, $model);
    }

    public function reduceContentToObject ($carry, $content) {
        $type = $content->type;
        $type_key = $content->type->name;
        if (!isset($carry[$type_key])) {
            $carry[$type_key] = $type;
        }
        if ($type->format == ContentType::ARRAY) {
            if (!isset($type->values)) {
                $type->values = new Collection();
            }
            $type->values->push($content->value);
        }
        else if ($type->format == ContentType::BOOLEAN) {
            $type->value = (bool)$content->value;
        }
        else if ($type->format == ContentType::NUMBER) {
            $type->value = (double)$content->value;
        }
        else if ($type->format == ContentType::DATETIME) {
            $type->value = Carbon::parse($content->value);
        }
        else if ($type->format == ContentType::OBJECT) {
            $children = $content->children()->with('type')->get();
            $type->children = $children->reduce([ $this, 'reduceContentToObject' ], []);
        }
        else {
            $type->value = $content->value;
        }
        return $carry;
    }

    /**
     * A query-filter handler, enabling retrieving extra content belonging to a model
     */
    protected function with_content() {
        $this->builder->with('contents.type');
        
        return $this->defer(function ($model) {
            $model['content'] = $model->contents->reduce([ $this, 'reduceContentToObject' ], []);
            unset($model->contents);
            return $model;
        });
    }

    /**
     * A query-filter handler, enabling retrieving assets belonging to a model
     */
    protected function with_assets() {
        return $this->defer(function ($model) {
            $model->assets = $model->assets()->get();
            return $model;
        });
    }

    /**
     * A query-filter handler, enabling retrieving images belonging to a model
     */
    protected function with_images() {
        return $this->defer(function ($model) {
            $model->images = $model->images()->get();
            return $model;
        });
    }
}