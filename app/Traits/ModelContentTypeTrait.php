<?php

namespace App\Traits;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;

trait ModelContentTypeTrait
{
    public static function isNumber($data) {
        return is_numeric($data);
    }

    public static function isString($data) {
        return is_string($data);
    }

    public static function isBoolean($data) {
        return is_bool($data);
    }

    public static function isArray($data) {
        return is_array($data);
    }

    public static function isObject($data) {
        return is_object($data);
    }

    public static function isDateTime($data) {
        return !is_object($data) && !!strtotime($data);
    }

    protected static function transform(string $data) {
        if (self::isDateTime($data)) return $data;
        return json_decode($data) ?? $data;
    }

    public static function format($data) {
        $transformed = self::transform($data);
        if (self::isArray($transformed)) return self::ARRAY;
        else if (self::isDateTime($transformed)) return self::DATETIME;
        else if (self::isNumber($transformed)) return self::NUMBER;
        else if (self::isString($transformed)) return self::STRING;
        else if (self::isBoolean($transformed)) return self::BOOLEAN;
        else if (self::isObject($transformed)) return self::OBJECT;
        else throw new Exception("type of $transformed not found");
    }

    public static function formats() {
        return [ 
            self::ARRAY,
            self::DATETIME,
            self::NUMBER,
            self::STRING,
            self::BOOLEAN,
            self::OBJECT
        ];
    }

    public function scopeAllowsMultiple() {
        return ($this->format == self::ARRAY) || ($this->format == self::OBJECT);
    }
}
