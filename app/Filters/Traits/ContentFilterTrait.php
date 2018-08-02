<?php

namespace App\Filters\Traits;

use App\Models\ContentType;
use Illuminate\Support\Collection;

trait ContentFilterTrait
{

    /**
     * A query-filter handler, enabling retrieving extra content belonging to a model
     */
    protected function with_content() {
        $this->builder->with('contents.type');

        function reduceContentToObject ($carry, $content) {
            $type = $content->type;
            $type_key = $content->type->name;
            if ($type->format == ContentType::ARRAY) {
                if (!isset($carry[$type_key])) {
                    $carry[$type_key] = new Collection();
                }
                $carry[$type_key]->push($content->value);
            }
            else if ($type->format == ContentType::BOOLEAN) {
                $carry[$type_key] = (bool)$content->value;
            }
            else if ($type->format == ContentType::NUMBER) {
                $carry[$type_key] = (double)$content->value;
            }
            else if ($type->format == ContentType::DATETIME) {
                $carry[$type_key] = Carbon::parse($content->value);
            }
            else if ($type->format == ContentType::OBJECT) {
                $children = $content->children()->with('type')->get();
                $carry[$type_key] = $children->reduce(function ($carry, $content) {
                    return reduceContentToObject($carry, $content);
                }, []);
            }
            else {
                $carry[$type_key] = $content->value;
            }
            return $carry;
        }
        
        return $this->defer(function ($model) {
            $model['content'] = $model->contents->reduce(function ($carry, $content) {
                return reduceContentToObject($carry, $content);
            }, []);
            if (!$this->request->has('with_contents') && !$this->request->has('with_content_types')) {
                unset($model->contents);
            }
            return $model;
        });
    }

    protected function with_contents() {
        return $this->builder->with('contents');
    }
    
    protected function with_content_types() {
        return $this->builder->with('contents.type');
    }
}
