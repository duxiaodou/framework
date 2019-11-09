<?php
namespace Io\Input;
/**
 * 
 */
class Input
{
    protected $data;
    function __construct()
    {
        $this->data = $_REQUEST;
    }

    public function getData() {
        return $this->data;
    }
}