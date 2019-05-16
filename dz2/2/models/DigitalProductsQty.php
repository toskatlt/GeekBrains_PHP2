<?php
namespace app\models;

class DigitalProductsQty extends DigitalProducts {
	protected $qty;
	
	function __construct($id, $name, $price, $qty) {
		parent::__construct($id, $name, $price);
		$this->qty = $qty;
	}
	
	public function getCost() {
		return $this->price/2 * $this->qty;
	}
	
	public function getProfit() {
		return round($this->getCost()* 3 / 100 * $this->qty, 2);
	}
	
	public function getSaleInfo() {
		$saleInfo .= "id. {$this->id}; ";
		$saleInfo .= "продукт {$this->name}; ";
		$saleInfo .= "цена за 1 ед. {$this->price} руб.; ";
		$saleInfo .= "кол-во {$this->qty}; ";
		$saleInfo .= "сумма {$this->getCost()} руб.; ";
		$saleInfo .= "доход с продажи: {$this->getProfit()} руб.";
		$saleInfo .= "</br>";
		return $saleInfo;
	}
}