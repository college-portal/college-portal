<?php

namespace App\Filters;

use App\User;
use App\Models\Content;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContentFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function with_owner() {
        return $this->defer(function ($content) {
            $content->owner = $content->owner()->first();
            return $content;
        });
    }

    public function with_type() {
        return $this->builder->with('type');
    }
}