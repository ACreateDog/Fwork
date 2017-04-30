<?php

namespace Core\Route;

//use Core\Cache\Cache;

class Route
{
    //请求参数的解析
    public static $requestArr = [];
    //请求参数的信息
    public static $pathInfo   = null;

    //解析出的控制器
    public static $controller = null;
    //解析出的方法
    public static $method     = null;
    //解析出的参数
    public static $params     = [];

    public static function parseURL()
    {
        //路由解析

        self::$pathInfo = trim($_SERVER['PATH_INFO'],'/');
        self::$requestArr = explode('/',self::$pathInfo);


        self::parseRequestParams();
        self::parseController();
        $controller = self::$controller;
        $conObj = new $controller;

        call_user_func([$conObj,self::$method],self::$params);

    }

    public static function parseController()
    {
        try{
            $controller = '\\Controller\\'.self::$requestArr[0];
            if (!class_exists($controller)){
                throw new \Exception('the class '.$controller.'is not found');
            }

            self::$controller = $controller;
            self::$method = self::$requestArr[1];
        }catch (\Exception $e){

        }
    }

    public static function parseRequestParams()
    {
        //解析出 参数
        $paramArr = array();

        if(count(self::$requestArr) > 3 && count(self::$requestArr) % 2 == 0){
            $index = 2;
            while ($index < count(self::$requestArr)){

                $key =  self::$requestArr[$index++];
                $value =self:: $requestArr[$index++];
                $paramArr[$key] = $value;
            }
        }

        if (!empty($_REQUEST)){
            $paramArr = array_merge($paramArr,$_REQUEST);
        }

        self::$params = $paramArr;
    }
}