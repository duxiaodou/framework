<?php
//自动加载器
spl_autoload_register(function($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    if( file_exists($className.'.php') ) {
        require_once  $className. '.php';
    } else {
        throw new Exception("Class: $className not found", 404);
    }
});