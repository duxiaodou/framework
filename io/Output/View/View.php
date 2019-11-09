<?php
namespace Io\Output\View;
use Exception;
/**
 * 
 */
class View
{
    public $data;
    function __construct()
    {
    }

    function load($view, $data) {
        $viewFilePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $view . '.view.php';
        if ( !file_exists($viewFilePath) ) {
            throw new Exception("view : $view .view.php not found", 404);
        }
        include_once $view . '.view.php';
    }
}