<?php

namespace app\controllers;

use app\engine\Request;
use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
        echo $this->render('basket', [
            'products' => Basket::getBasket(session_id())
        ]);
    }
    public function actionAddBasket() {

        //Поместить товар в корзину

        $request = new Request();
        $id = $request->getParams()['id'];
        $basket = new Basket(null, session_id(), $id);
        $basket->save();


       // (new Basket(null, session_id(), (new Request())->getParams()['id']))->save();

        $count = Basket::getCountWhere('session_id', session_id());
        $response = ['count' => $count];

        header('Content-Type: application/json');
        echo json_encode($response);
    }

}