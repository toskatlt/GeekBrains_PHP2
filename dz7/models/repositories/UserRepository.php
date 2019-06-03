<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Users;


class UserRepository extends Repository
{

    public $id;
    public $login;
    public $pass;

    /**
     * Users constructor.
     * @param $id
     * @param $login
     * @param $pass
     */
    public function __construct($id = null, $login = null, $pass = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->login = $login;
        $this->pass = $pass;
    }

    public function auth($login, $pass) {
        $user = $this->getOneWhere('login', $login);
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function isAuth() {
        return isset($_SESSION['login']) ? true: false;
    }

    public function getName() {
        return $this->isAuth() ? $_SESSION['login'] : "Guest";
    }


    public function getTableName()
    {
        return "users";
    }

    public function getEntityClass()
    {
        return Users::class;
    }

}