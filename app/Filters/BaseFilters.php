<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Filters\Traits\ContentFilterTrait;
use Mykeels\Filters\BaseFilters as Filters;
use Carbon\Carbon;

class BaseFilters extends Filters
{
    use ContentFilterTrait;

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