<?php

namespace App\Services;


use App\Traits\ApiResponseTrait;

abstract class BaseService
{
	use ApiResponseTrait;

	abstract public function repo();
}