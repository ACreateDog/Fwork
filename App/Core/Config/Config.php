<?php


namespace App\Core\Config;


class Config
{

    static public $config = [];


    public static function get($name)
    {

        if (array_key_exists($name,self::$config))
            return self::$config[$name];

        return null;
    }

    public static function set($key = null, $value = null)
    {
        self::$config[$key] = $value;
    }
}