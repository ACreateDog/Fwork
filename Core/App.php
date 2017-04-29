<?php
namespace Core;


use Core\Config\Config;
use Core\Route\Route;

class App{

    static public function run()
    {


        include 'App/Project/Common/common.php';
        //类加载器
        spl_autoload_register('self::autoLoad');

        //加载配置
        Config::$config = include 'App/Project/Common/config.php';

        //路由解析
        Route::parseURL();
    }

    static public function autoLoad($className){

//         echo($className);
        echo($className);
        try{
            $className = str_replace('\\','/',$className);
            $filePath = $className.'.php';

            if (is_file($filePath) && file_exists($filePath))
                include $className.'.php';
            else
                throw new \Exception('此类文件不存在');
        }catch (\Exception $exception){
            echo $exception->getMessage();
        }

    }
}