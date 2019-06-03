<?php

use app\models\entities\Product;

class ProductTest extends \PHPUnit\Framework\TestCase {
    public function testProduct() {
        $name = "Чай";
        $product = new Product($name, "Цейлонский", 22);
        $this->assertEquals($name, $product->name);
    }
}