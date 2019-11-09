<?php
namespace Controller;

use Io\Input\Input;
use Io\Output\Output;
use Pipeline\Pipeline;
use Controller\BaseController;

/**
 * 
 */
class IndexController extends BaseController
{

    function test() {
        $this->output->setData($this->input->getData());
        return $this->output->toJson();
    }

    function test2() {
        $this->output->setData($this->input->getData());
        return $this->output->toView('test');
    }
}