<?php
namespace Route;

/**
 *
 */
class Route
{
    protected $url;
    function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
    }

    /*
        分发Url至控制器
     */
    function dispatchUrlToController() {
        $paths = explode('/', $this->url);
        array_shift($paths); // 移除第一个元素：其内容为空
        return $this->pathToController($paths);
    }

    /*
        路径转为控制器
     */
    function pathToController($paths) {
        $actionName = parse_url(array_pop($paths), PHP_URL_PATH);
        $controllerName = 'Index'; // 默认控制器

        // path只有一级，默认让Controller\Index.php处理
        if (count($paths) > 0) {
            $controllerName = implode('\\', $paths);
        }

        // 将路由转换为驼峰形式: 'aaa\bbb' => 'Aaa\Bbb'
        $controllerName = ucwords($controllerName, '\\') . 'Controller';

        return [
            'controller' => $controllerName,
            'action' => $actionName
        ];
    }
}