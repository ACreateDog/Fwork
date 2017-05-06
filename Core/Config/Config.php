<?php


namespace Core\Config;


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

    public static function loadConfig()
    {


        $userConfig = PROJECT_PATH.'Common/config.php';
        $defaultConfig = CORE_PATH.'Config/config.php';

        if (is_array($userConfig) && !empty($userConfig)){
            $memrgConfig = array_merge($userConfig,$defaultConfig);
            self::$config = $memrgConfig;

        }else{
            self::$config = $defaultConfig;
        }

    }
}