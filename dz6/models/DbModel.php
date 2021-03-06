<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class DbModel extends Models implements IModel {

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

    public static function getCountWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:$field";
        return Db::getInstance()->queryOne($sql, ["$field"=>$value])['count'];
    }

    public static function getOneWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";

        return Db::getInstance()->queryObject($sql, ["$field"=>$value], static::class);
    }

    public static function getLimit($from, $limit) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :limit";
        return Db::getInstance()->queryAll($sql, [':from' => $from, ':limit' => $limit]);
    }

    public function insert() {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {

            if ($key == "db" || $key == "id") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";

        }

        $columns = implode(", ", $columns);
        $value = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$value})";

        Db::getInstance()->execute($sql, $params);

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
        if (is_null($this->id))
            $this->insert();
        else
            $this->update();
    }

    abstract static public function getTableName();
}