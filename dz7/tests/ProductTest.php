<?php

use app\models\entities\Product;

class ProductTest extends \PHPUnit\Framework\TestCase {
    public function testProduct() {
        $name = "���";
        $product = new Product($name, "����������", 22);
        $this->assertEquals($name, $product->name);
    }
}