<?php

session_start();
require "../config/config.php";
require "../engine/Autoload.php";

use app\engine\Render;
use app\engine\TwigRender;
use app\engine\Autoload;

spl_autoload_register([new Autoload(), 'loadClass']);
require_once '../vendor/autoload.php';

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo "404";
}