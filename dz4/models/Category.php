<?php

namespace app\models;

class Category extends Model {
    public $id;
    public $name;
    public $sex;

    public function getTableName() {
        return 'category';
    }
}