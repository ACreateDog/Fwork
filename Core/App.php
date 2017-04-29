<?php
namespace Core;


use Core\Config\Config;
use Core\Route\Route;

class App{

    static public function run()
    {


        include 'App/Project/Common/common.php';

        //类加载器
        include 'Loader.php';
        Loader::register();

        //加载配置
        Config::$config = include 'App/Project/Common/config.php';

        //路由解析
        Route::parseURL();
    }

}