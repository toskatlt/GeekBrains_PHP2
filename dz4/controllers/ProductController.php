<?php

namespace app\controllers;

use app\models\Products;

class ProductController extends Controller {
    private $action;
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action = null) {
        $this->action = $action ?: 'catalog';
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {

            $this->$method();
        }
        else {
            echo "404";
        }

    }

    public function actionCatalog() {
        $products = Products::getAll();
        echo $this->renderTemplate("catalog", [
            'products' => $products
        ]);
    }

    public function actionCard() {
        $id = $_GET['id'];
        $product = Products::getOne($id);
        echo $this->renderTemplate("card", [
            'product' => $product
        ]);
    }
}