<?php

function jump($url){
    header('Location:'.$url);
}

/**
 * 缓存变量
 * @param $key 要缓存的关键字
 * @param null $value
 * @return bool
 */

function cacheVar($key,$value = null){
    if (empty($value) ){
        if (array_key_exists($key,$_SESSION)){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    $_SESSION[$key] = $value;
}

function outPut($content){
    echo $content;
}


function request($key){
    return \Core\Request::get($key);
}
