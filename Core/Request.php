<?php
/**
 * Created by PhpStorm.
 * User: feifei
 * Date: 2017/4/30
 * Time: 上午9:57
 */

namespace Core;


class Request
{
    public static $requestInfo = [];
    public static $file        = [];


    public static function get($key){

        if (array_key_exists($key,self::$requestInfo)){
            return self::$requestInfo[$key];
        }


        return null;
    }

}