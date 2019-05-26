<?php

namespace app\models;

class Products extends DbModel {
    public $id;
    public $product_name;
    public $purchase_price;
    public $price;
	public $id_categories;
	
	protected $prop = [
        'id' => false,
        'product_name' => false,
        'purchase_price' => false,
        'price' => false,
		'id_categories' => false,
    ];

    public function setId($id): void {
        $this->id = $id;
        $this->prop['id'] = true;
    }

    public function setProductName($product_name): void {
        $this->product_name = $product_name;
    }

    public function setPurchasePrice($purchase_price): void {
        $this->purchase_price = $purchase_price;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }
	
	public function setIdCategories($id_categories): void {
        $this->id_categories = $id_categories;
    }

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