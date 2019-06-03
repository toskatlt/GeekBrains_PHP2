<?php
namespace app\models\entities;

class Users extends DataEntity
{
    public $id;
    public $login;
    public $pass;
    public $properties = [
        'id' => false,
        'login' => false,
        'pass' => false
    ];


    public function setId($id): void
    {
        $this->id = $id;
        $this->properties['id'] = true;
    }


    public function setLogin($login): void
    {
        $this->login = $login;
        $this->properties['login'] = true;
    }


    public function setPass($pass): void
    {
        $this->pass = $pass;
        $this->properties['pass'] = true;
    }



    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function getTableName()
    {
        return "users";
    }




}