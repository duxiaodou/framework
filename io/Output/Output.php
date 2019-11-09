<?php
namespace Io\Output;
use Io\Output\View\View;

/**
 * 
 */
class Output
{
    public $data;

    function __construct($data = null)
    {
        $this->data = $data;
    }

    function setData($data) {
        $this->data = $data;
    }

    function toJson() {
        header('Content-Type:application/json; charset=utf-8');
        return json_encode($this->getData());
    }

    function toView($view) {
        header("Content-type:text/html;charset=utf-8");
        return View::load($view, $this->getData());
    }

    function getData() {
        return $this->data;
    }
}