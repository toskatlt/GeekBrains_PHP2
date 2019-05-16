<?php

//use app\models\{Products, Users, Basket}; //PHP Parse error:  syntax error, unexpected '{', expecting identifier (T_STRING) 
// Постараюсь в ближайшее время обновить версию PHP на сервере

use app\models\Products;
use app\models\Users;
use app\models\Basket;
use app\engine\Db;

include_once "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Products(new Db());

//var_dump($product->getOne(1));
//var_dump($product instanceof Products);