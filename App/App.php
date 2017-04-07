<?php
namespace App;


use App\Config\Config;
use App\Route\Route;

class App{

    static public function run()
    {

        //类加载器
        include 'App/Common/common.php';
//        jump('http://www.baidu.com');
        spl_autoload_register('self::autoLoad');

        //加载配置
        Config::$config = include 'App/Common/config.php';

        //路由解析
        Route::parseURL();
    }

    static public function autoLoad($className){

        $className = str_replace('\\','/',$className);
        $filePath = $className.'.php';

        if (is_file($filePath) && file_exists($filePath))
            include $className.'.php';
        else
            throw new \Exception('此类文件不存在');
    }
}