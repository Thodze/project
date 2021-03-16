<?php
namespace backend\components;

class Singleton
{
    private function __construct()
    {

    }

    public static function getInstance($force = false)
    {
        if ($force) {
            return new static();
        }
        if (empty(static::$self)) {
            static::$self = new static();
        }
        return static::$self;
    }
}