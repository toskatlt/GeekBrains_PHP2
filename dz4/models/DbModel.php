<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class DbModel extends Models implements IModel {
    protected $db;

    public function __construct() {
        $this->db = Db::getInstance();
    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert() {
		$fields = '';
		$values = '';
		$exceptions = ['id', 'db'];
		$data = get_object_vars($this);
        foreach ($data as $column => $value) {
			if (!in_array($column, $exceptions)) {
            	$fields .= "`{$column}`,";
				$values .= "'{$value}',";
			}
        }
        $fields = substr($fields, 0, strlen($fields) - 1);
		$values = substr($values, 0, strlen($values) - 1);
		
        $tableName = $this->getTableName();
		$sql = "INSERT INTO {$tableName} ({$fields}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params = []);
		$this->id = Db::getInstance()->lastInsertId();
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        Db::getInstance()->execute($sql, ["id" => $this->id]);
    }

    public function update() {

    }

    public function save() {

    }

    abstract static public function getTableName();
}