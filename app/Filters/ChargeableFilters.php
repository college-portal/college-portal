<?php

namespace App\Filters;

use App\User;
use App\Models\Chargeable;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChargeableFilters extends BaseFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    /**
     * includes the chargeable service
     */
    public function with_service() {
        return $this->builder->with('service');
    }

    /**
     * includes the chargeable's owner
     */
    public function with_owner() {
        return $this->builder->with('owner');
    }

    /**
     * filters by the chargeable service id
     */
    public function service($id) {
        return $this->builder->where('chargeable_service_id', $id);
    }

    /**
     * filters by the owner id
     */
    public function owner($id) {
        return $this->builder->where('owner_id', $id);
    }

    /**
     * filters the minimum amount
     */
    public function min_amount($amount) {
        return $this->builder->where('amount', '>=', $amount);
    }

    /**
     * filters by the maximum amount
     */
    public function max_amount($amount) {
        return $this->builder->where('amount', '<=', $amount);
    }
}