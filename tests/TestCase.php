<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Traits\TestJsonWebTokenTrait;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations, CreatesApplication, TestJsonWebTokenTrait;
}
