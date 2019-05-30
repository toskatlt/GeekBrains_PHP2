<?php
session_start();
use app\models\Products;

include "../engine/Autoload.php";
include "../config/main.php";

use app\engine\Autoload;
use app\models\Users;
use app\engine\Render;
use app\engine\Request;

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

echo $controllerName.' controllerName<br>';
echo $actionName.' actionName<br>';

$controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
}

/** @var Products $product */

//$user = Users::getOne(1);
//var_dump($user);

//$product = Products::getOne(2);
//$product->name = "Новый пончик";
//var_dump($product);
//$product = new Products(null, "Огурец", "Зеленый", 22);
//$product->price = 25;
//$product->insert();
//$product->save();

//var_dump($product);

//$product->delete();


