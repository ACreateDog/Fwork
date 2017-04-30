<?php

    defined('ROOT_PATH')    OR define('ROOT_PATH',__DIR__.'/');
	defined('APP_PATH')     OR define('APP_PATH', ROOT_PATH.'App/');
    defined('PROJECT_PATH') OR define('PROJECT_PATH',APP_PATH.'Project/');
    defined('CORE_PATH')    OR define('CORE_PATH',ROOT_PATH.'/Core/');

    include './Core/App.php';
    \Core\App::run();
