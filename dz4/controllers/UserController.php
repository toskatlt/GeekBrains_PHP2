<?php

namespace app\controllers;

use app\models\Users;

class UserController extends Controller {
    private $action;
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action = null) {
        $this->action = $action ?: 'users';
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {

            $this->$method();
        }
        else {
            echo "404";
        }

    }

    public function actionUsers() {
        $users = Users::getAll();
        echo $this->renderTemplate("users", [
            'users' => $users
        ]);
    }

    public function actionUser() {
        $id = $_GET['id'];
        $user = Users::getOne($id);
        echo $this->renderTemplate("user", [
            'user' => $user
        ]);
    }
}