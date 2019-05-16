<?php

namespace app\models;

class DigitalProducts extends Products {
	
	function __construct($id, $name, $price) {
		parent::__construct($id, $name, $price);
	}
	
	public function getCost() {
		return $this->price/2;
	}
	
	public function getProfit() {
		return round($this->getCost()* 3 / 100, 2);
	}
	
	public function getSaleInfo() {
		$saleInfo .= "id. {$this->id}; ";
		$saleInfo .= "продукт {$this->name}; ";
		$saleInfo .= "сумма {$this->getCost()} руб.; ";
		$saleInfo .= "доход с продажи: {$this->getProfit()} руб.";
		$saleInfo .= "</br>";
		return $saleInfo;
	}
}