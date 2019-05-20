<?php

namespace app\models;

class Users extends Model {
    public $id;
    public $login;
    public $pass;
	public $hash;
	public $access;

    public function getTableName() {
        return 'users';
    }
} 