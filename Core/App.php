<?php
namespace Core;


use Core\Config\Config;
use Core\Route\Route;

class App{

    static public function run()
    {

        //加载用户全局的函数
        require PROJECT_PATH.'/Common/common.php';

        //加载系统的全局函数
        require CORE_PATH.'Helper.php';

        //类加载器
        include 'Loader.php';
        Loader::register();

        //加载配置
        Config::loadConfig();

        //路由解析
        Route::parseURL();
    }

}