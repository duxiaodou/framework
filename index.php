<?php
require_once('autoloader.php');

use Route\Route;
Use Controller\Controller;

$route = new Route();
$controllerAction = $route->dispatchUrlToController();

$controllerName = $controllerAction['controller'];
$actionName = $controllerAction['action'];

Controller::exec($controllerAction['controller'], $controllerAction['action']);