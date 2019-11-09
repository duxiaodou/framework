<?php
namespace Pipeline;

use Io\Output\Output;
/**
 * 
 */
abstract class Pipeline
{
    protected $data;

    function __construct(&$data)
    {
        $this->data = $data;
        return $this->handle();
    }

    final public function getData() {
        return $this->data;
    }

    abstract public function handle();

    public static function schedule(&$data, $pipelines) {
        for ($i = 0; $i < count($pipelines); $i++) {
            $pipeline = new $pipelines[$i]($data);
            $data = $pipeline->getData();
            if ($suspend = $pipeline->handle()) {
                return $suspend;
            }
        }
    }
}