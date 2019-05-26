<?php

namespace app\models;

class Basket extends Model {
    public $id;
    public $id_session;
    public $id_orders;
    public $id_products;
	public $quantity;

    public function getTableName() {
        return 'basket';
    }
}