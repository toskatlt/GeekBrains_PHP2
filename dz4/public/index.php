<?php
use app\models\Products;


include "../engine/Autoload.php";
include "../config/main.php";

use app\engine\Autoload;
use app\models\Users;

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

echo "{$controllerName} - controllerName <br>";
echo "{$actionName} - actionName <br>";

$controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

echo "{$controllerClass} - controllerClass <br>";
echo "<br>";
echo "/index.php?c=product&a=card&id=1 вывод товара id<br>";
echo "/index.php?c=product&a=catalog вывод всех товаров<br>";
echo "/index.php?c=user&a=user&id=1 вывод пользователя по id<br>";
echo "/index.php?c=user&a=users вывод всех пользователей<br>";
echo "<br>";
echo "<hr>";

/*
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}
*/
/** @var Products $product */

$product = Products::getOne(21);
//var_dump($user);

//$product = new Products("ADIDAS кроссовки", 35, 65, 6);
//$product->insert();
$product->delete();
//$product->price = 25;
//$product->insert();
//$product->save();

//var_dump($product);

//$product->delete();


