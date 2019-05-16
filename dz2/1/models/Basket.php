<?php

namespace app\models;

class Basket extends Model {
	public $id;
    public $id_session;
    public $id_goods;
    public $quantity;

    public function getTableName() {
        return 'basket';
    }
}