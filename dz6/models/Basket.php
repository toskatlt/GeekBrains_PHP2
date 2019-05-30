<?php

namespace app\models;

use app\engine\Db;

class Basket extends DbModel {
    public $id;
    public $id_session;
    public $id_products;

    public function __construct($id = null, $id_session = null, $id_products = null) {
        $this->id = $id;
        $this->id_session = $id_session;
        $this->id_products = $id_products;
    }

    public static function getBasket($session) {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price FROM basket b,products p WHERE b.id_products=p.id AND id_session = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }

    public static function getTableName() {
        return "basket";
    }
}