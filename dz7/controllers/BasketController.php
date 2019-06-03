<?php

namespace app\controllers;

use app\engine\Request;
use app\models\entities\Basket;
use app\models\repositories\BasketRepository;

class BasketController extends Controller
{
    public function actionIndex() {
        echo $this->render('basket', [
            'products' => (new BasketRepository())->getBasket(session_id())
        ]);
    }
    public function actionAddBasket() {

        //Поместить товар в корзину

        (new BasketRepository())->save(new Basket(session_id(), (new Request())->getParams()['id']));


        $count = (new BasketRepository())->getCountWhere('session_id', session_id());
        $response = ['count' => $count];
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function actionDelete()
    {
        //Прежде чем удалять, убедимся что сессия совпадает
        $id = (new Request())->getParams()['id'];
        $basket = (new BasketRepository())->getOne($id);
        if (session_id() == $basket->session_id) {
            (new BasketRepository())->delete($basket);
            $count = (new BasketRepository())->getCountWhere('session_id', session_id());
            echo json_encode(['response' => 1, 'count' => $count]);
        } else
        {
            echo json_encode(['response' => 0]);
        }

    }

}