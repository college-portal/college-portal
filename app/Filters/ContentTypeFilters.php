<?php

namespace App\Filters;

use App\User;
use App\Models\ContentType;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContentTypeFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }
}