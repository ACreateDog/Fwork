<?php
/**
 * Created by PhpStorm.
 * User: feifei
 * Date: 2017/4/29
 * Time: 下午8:51
 */

namespace Core;


class Loader
{
    public static $record = [];
    public static $classMap = [];

    public static function register()
    {
        spl_autoload_register('\Core\Loader::autoLoad');

        self::$record = [
            'project'=>PROJECT_PATH,
            'core' => ROOT_PATH
        ];

    }

    public static function autoLoad($className)
    {
        try{
            $file = self::findFile($className);
            if ($file !== false){
                require $file;
            }else{
                throw new \Exception($className.'not founded!');
            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public static function findFile($className)
    {
        $filePath = '';
        if (array_key_exists($className,self::$classMap)){
            return self::$classMap[$className];
        }

        $classToPath = str_replace('\\','/',$className);
        $classToPath = trim($classToPath,'/');

        foreach (self::$record as $key => $base){

            $filePath = $base.$classToPath.'.php';

            if (is_file($filePath) && file_exists($filePath)){

                self::$classMap[$className] = $filePath;
                return $filePath;
            }
        }

        return false;
    }
}