<?php
use app\models\Products;

include "../engine/Autoload.php";
include "../config/main.php";
include "../vendor/autoload.php";

use app\engine\Autoload;
use app\models\Users;
use app\controllers\Render;

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

//echo "{$controllerName} - controllerName <br>";
//echo "{$actionName} - actionName <br>";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
}

echo $twig->render('index.tmpl', []);


