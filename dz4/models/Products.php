<?php

namespace app\models;

class Products extends DbModel {
    public $id;
    public $product_name;
    public $purchase_price;
    public $price;
	public $id_categories;

    public function __construct($product_name = null, $purchase_price = null, $price = null, $id_categories = null) {
        parent::__construct();
        $this->product_name = $product_name;
        $this->purchase_price = $purchase_price;
        $this->price = $price;
        $this->id_categories = $id_categories;
    }

    public static function getTableName() {
        return 'products';
    }


}