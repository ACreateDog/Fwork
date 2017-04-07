<?php

namespace App\Cache;

class  Cache{


    public static function has($key){
        $filePath = self::getFilePath($key);

        if ($filePath !== false && file_exists($filePath)){
            return true;
        }else{
            return false;
        }
    }

    public static function getFilePath($key)
    {
        if (empty($key))
            return false;
        $key_md = self::getHashKey($key);
        $basePath =  \App\Config\Config::get('CACHE_PATH');
        if (!is_dir($basePath))
            mkdir($basePath,0777);
            $filePath = $basePath.'/'.$key_md.'.php';

        return $filePath;

    }
    public static function get($key)
    {
        $filePath = self::getFilePath($key);
        if ($filePath !== false &&  file_exists($filePath)){
            if (is_readable($filePath)){
                return file_get_contents($filePath);
            }else{
                chmod($filePath,'6');
                return file_get_contents($filePath);
            }
        }else{
            return false;
        }
    }

    public static function set($key,$value)
    {
        $filePath = self::getFilePath($key);
        if ($filePath !== false){
            if (!file_exists($filePath)){
                touch($filePath);
            }
            file_put_contents($filePath,$value);
        }
    }
    public static function getHashKey($key)
    {
        if (empty($key))
            return false;
        return md5($key);
    }

    public static function clearCache($key)
    {
        $filePath = self::getFilePath($key);
        if ($filePath !== false ){
            if (file_exists($filePath)){
                unlink($filePath);
            }
        }

        return true;
    }
}