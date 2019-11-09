<?php
namespace Controller;

use Io\Input\Input;
use Io\Output\Output;

/**
 * 
 */
class BaseController
{
    protected $input;
    protected $output;
    public $pipelines = [];

    function __construct()
    {
        $this->input = new Input();
        $this->output = new Output();
    }
}