<?php

namespace app\models;

class Users extends DbModel {
    public $id;
    public $login;
    public $pass;
	public $hash;
	public $access;

	public function __construct($login = null, $access = null) {
        parent::__construct();
        $this->product_name = $login;
        $this->id_categories = $access;
    }
	
    public static function getTableName()
    {
        return 'users';
    }

}