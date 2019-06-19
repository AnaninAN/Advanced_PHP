<?php

namespace app\controllers;

use app\engine\Request;
use app\model\entities\Basket;
use app\model\repositories\BasketRepository;

class BasketController extends Controller
{

    public function actionDelete() {

        $id = (new Request())->getParams()['id'];
        $basket = (new BasketRepository())->getOne($id);
        if (session_id() === $basket->session_id) {
            (new BasketRepository())->delete($basket);
            $count = (new BasketRepository())->getCountWhere('session_id', session_id());
            $total = (new BasketRepository())->totalBasket(session_id())['total'];

            $response = [
                'response' => 1,
                'count' => $count,
                'total' => $total
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = [
                'response' => 0
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
        }

    }

    public function actionAddBasket() {

        $basket = new Basket(session_id(), (new Request())->getParams()['id']);
        (new BasketRepository())->save($basket);

        $count = (new BasketRepository())->getCountWhere('session_id', session_id());


        $response = [
            'result' => 1,
            'count' => $count
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function actionIndex() {

        echo $this->render('basket', [
                'products' => (new BasketRepository())->getBasket(session_id()),
                'count' => (new BasketRepository())->getCountWhere('session_id', session_id()),
                'smallImgPath' => SMALL_IMG
            ]
        );
    }
}