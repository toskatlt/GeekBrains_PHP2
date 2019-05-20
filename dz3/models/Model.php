<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel {
    protected $db;

    public function __construct() {
        $this->db = Db::getInstance();
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id'=>$id]);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function insert($data) {
		var_dump($data);
    }

    public function delete() {
		$tableName = $this->getTableName();
		$sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, []);
    }

    public function update() {

    }

    abstract public function getTableName();
}