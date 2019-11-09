<?php
namespace Controller;
use Exception;
use Pipeline\Pipeline;
/**
 * 
 */
class Controller
{
    function __construct()
    {
        # code...
    }

    static function exec($controllerName, $actionName)
    {
        $controllerFilePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . $controllerName . '.php';

        if ( !file_exists($controllerFilePath) ) {
            throw new Exception("Controller class: $controllerName not found", 404);
        }

        $controllerName = 'Controller' . '\\'. $controllerName;
        $controller = new $controllerName;
        if ($controller->pipelines) {
            if ($result = Pipeline::schedule($data, $controller->pipelines)) {
                echo $result;
                exit();
            }
        }
        echo $controller->$actionName();
    }
}