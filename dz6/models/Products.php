<?php

namespace app\models;

use app\engine\Db;

class Products extends DbModel {
    public $id;
    public $name;
    public $purchase_price;
    public $price;

    protected $prop = [
        'id' => false,
        'name' => false,
        'purchase_price' => false,
        'price' => false,
    ];

    public function setId($id): void {
        $this->id = $id;
        $this->prop['id'] = true;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setPurchase_price($purchase_price): void {
        $this->purchase_price = $purchase_price;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function __construct($id = null, $name = null, $purchase_price = null, $price = null) {
        $this->id = $id;
        $this->name = $name;
        $this->purchase_price = $purchase_price;
        $this->price = $price;
    }

    public static function getTableName() {
        return 'products';
    }


}