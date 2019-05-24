<?php

namespace app\models;

class Orders extends Model {
    public $id;
    public $id_user;
    public $order_price;
	public $order_status;

    public function getTableName() {
        return 'orders';
    }
} 