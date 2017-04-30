<?php

    function jump($url){
        header('Location:'.$url);
    }

    function cacheVar($var,$value = null){
        if (empty($value) ){
            if (array_key_exists($var,$_SESSION)){
                return $_SESSION[$var];
            }else{
                return false;
            }
        }
        $_SESSION[$var] = $value;
    }

    function outPut($content){
        echo $content;
    }