<?php
session_start();

//include "../engine/Autoload.php";
include "../config/main.php";
require_once '../vendor/autoload.php';

use app\engine\Autoload;
use app\engine\Render;
use app\models\repositories\ProductRepository;
use app\engine\Request;
use app\models\entities\Product;

spl_autoload_register([new Autoload(), 'loadClass']);

try {
    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    /** @var Product $product */


//$repo = new ProductRepository();
//$product_entity = new Product("Конфета", "Сладкая", 23);
//$product = $repo->getOne(1);
//$product->setPrice(22);
//$product->setDescription("Новое описание 2");
//$repo->update($product);

//var_dump($product);
//die();
//$repo->save($product_entity);


    $controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        throw new \Exception("No Controller");
    }

} catch (\PDOException $e) {
    echo $e->getMessage();
}

catch (\Exception $e) {
    echo 'Такой страницы не существует';
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


