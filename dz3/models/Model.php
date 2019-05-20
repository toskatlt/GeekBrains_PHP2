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

    public function insert() {
		$fields = '';
		$values = '';
		$exceptions = ['db'];
		$data = get_object_vars($this);
        foreach ($data as $column => $value) {
			if (!in_array($column, $exceptions)) {
            	$fields .= "`{$column}`,";
			}
        }
        $fields = substr($fields, 0, strlen($fields) - 1);
		
		foreach ($data as $column => $value) {
			if (!in_array($column, $exceptions)) {
            	$values .= "'{$value}',";
			}
        }
		$values = substr($values, 0, strlen($values) - 1);
		
        $tableName = $this->getTableName();
		$sql = "INSERT INTO {$tableName} ({$fields}) VALUES ({$values})";
        return $this->db->execute($sql);
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