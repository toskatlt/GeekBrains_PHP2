<?php

namespace app\models;

abstract class Products {
    protected $id;
    protected $name;
    protected $price;
	
	function __construct($id, $name, $price) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
	}
	
	abstract public function getCost();
	//abstract public function getProfit();
	//abstract public function getSaleInfo();
}