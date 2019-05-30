<?php

namespace app\controllers;

use app\models\Products;

class ProductController extends Controller {

    public function actionCatalog() {
        $page = (int)$_GET['page'] ?? 0;
        $page++;
        $limit = $page * 2;
        $products = Products::getLimit(0, $limit);
        echo $this->render("catalog", [
            'products' => $products,
            'page' => $page
        ]);
    }

    public function actionApiCatalog() {
        $page = (int)$_GET['page'] ?? 0;
        $page++;
        $limit = $page * 2;
        $products = Products::getLimit(0, $limit);

        header('Content-Type: application/json');

        echo json_encode([
            'products' => $products,
            'page' => $page
        ], JSON_UNESCAPED_UNICODE);

    }

    public function actionIndex() {
        echo $this->render("index");
    }

    public function actionCard() {
        $id = $_GET['id'];
        $product = Products::getOne($id);
        echo $this->render("card", [
            'product' => $product
        ]);
    }
}