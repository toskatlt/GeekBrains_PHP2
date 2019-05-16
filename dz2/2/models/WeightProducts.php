<?php

namespace app\models;

class WeightProducts extends Products {
	protected $qty;
	
	function __construct($id, $name, $price, $qty) {
		parent::__construct($id, $name, $price);
		$this->qty = $qty;
	}
	
	public function getCost() {
		return $this->qty * $this->price;
	}
	
	public function getProfit() {
		return round( $this->getCost()* 3 / 100, 2);
	}
	
	public function getSaleInfo() {
		$saleInfo .= "id. {$this->id}; ";
		$saleInfo .= "продукт {$this->name}; ";
		$saleInfo .= "цена за кг {$this->price} руб.; ";
		$saleInfo .= "вес {$this->qty}; ";
		$saleInfo .= "сумма {$this->getCost()}; ";
		$saleInfo .= "доход с продажи: {$this->getProfit()} руб.";
		$saleInfo .= "</br>";
		return $saleInfo;
	}
}