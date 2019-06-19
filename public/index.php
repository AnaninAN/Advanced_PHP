<?php

session_start();
require "../config/config.php";
require "../engine/Autoload.php";

use app\engine\Render;
//use app\engine\TwigRender;
use app\engine\Autoload;
use app\engine\Request;

try {
    spl_autoload_register([new Autoload(), 'loadClass']);
    //require_once '../vendor/autoload.php';


    $controllerName = (new Request())->getControllerName() ?: 'product';
    $actionName = (new Request())->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        throw new \Exception("Controller not found", 404);
    }
}
catch (\PDOException $e) {
    echo $e->getMessage();
}
catch (\Exception $e) {
    echo $e->getMessage();
}