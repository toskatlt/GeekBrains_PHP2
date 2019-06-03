<?php

namespace app\controllers;


use app\models\repositories\UserRepository;


class UserController extends Controller
{
    public function actionIndex()
    {
        $users = (new UserRepository())->getAll();
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

            if (!(new UserRepository())->auth($login, $pass)) {
                Die("Не верный пароль!");
            } else
                header("Location: /");
        }
    }

}