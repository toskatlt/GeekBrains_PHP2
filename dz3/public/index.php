<?php
use app\models\Products;

include "../engine/Autoload.php";
include "../config/main.php";

use app\engine\Autoload;

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Products("ADIDAS кроссовки", 35, 65, 6);
$product->insert();

//$product->delete();

var_dump($product->getOne(2));
var_dump($product->getOne(5));
