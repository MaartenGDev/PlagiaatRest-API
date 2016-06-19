<?php


namespace App\Core\Support;


abstract class Facade
{
    public static function __callStatic($name, $arguments)
    {
        $instance = static::getInstance(static::class);

        return call_user_func_array(array($instance,$name),$arguments);
    }

    public static function getInstance($facade){
        $class = $facade::getFacadeAccessor();

        return new $class;
    }

    abstract static function getFacadeAccessor();
}