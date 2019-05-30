<?php

namespace app\controllers;


use app\models\Users;

class UserController extends Controller
{
    public function actionIndex()
    {
        $users = Users::getAll();
        echo $this->render("users", [
            'users' => $users
        ]);
    }

    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }

    public function actionLogin()
    {
        //Авторизуем пользователя
        //Переделать на Request !!!!
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];

            if (!Users::auth($login, $pass)) {
                Die("Не верный пароль!");
            } else
                header("Location: /");
        }
    }

}