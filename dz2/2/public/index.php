<?php

use app\models\Products;
use app\models\DigitalProducts;
use app\models\DigitalProductsQty;
use app\models\PeiceProducts;
use app\models\PeiceProductsQty;
use app\models\WeightProducts;

include_once "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product1 = new DigitalProductsQty(1, "Операционная система", 7400, 2);
$product2 = new PeiceProductsQty(2, "Системный блок", 34000, 2);
$product3 = new WeightProducts(3, "Шурупы", 180, 0.75);
$product4 = new PeiceProducts(4, "Монитор", 12000);
$product5 = new DigitalProducts(5, "Антивирус", 2500);

echo "<b>Цифровой товар</b> {$product1->getSaleInfo()}";
echo "<b>Штучный товар</b> {$product2->getSaleInfo()}";
echo "<b>Весовой товар</b> {$product3->getSaleInfo()}";
echo "<b>Штучный товар</b> {$product4->getSaleInfo()}";
echo "<b>Цифровой товар</b> {$product5->getSaleInfo()}";