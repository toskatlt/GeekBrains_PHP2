<?php

namespace app\models;

class Products extends Model {
    public $id;
    public $product_name;
    public $purchase_price;
    public $price;
	public $id_categories;
	
	public function __construct($product_name, $purchase_price, $price, $id_categories) {
        parent::__construct();
        $this->product_name = $product_name;
        $this->purchase_price = $purchase_price;
        $this->price = $price;
        $this->id_categories = $id_categories;
    }
	
	public function insert() {
		
    }
	
    public function getTableName() {
        return 'products';
    }
}