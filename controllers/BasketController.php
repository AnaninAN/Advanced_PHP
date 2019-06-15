<?php

namespace app\controllers;

use app\model\Basket;
use app\engine\Request;

class BasketController extends Controller
{

    public function actionAddBasket() {

        (new Basket(session_id(),(new Request())->getParams()['id']))->save();

        $count = Basket::getCountWhere('session_id', session_id());


        $response = [
            'result' => 1,
            'count' => $count
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function actionIndex() {
        echo $this->render('basket', [
                'products' => Basket::getBasket(session_id()),
                'count' => Basket::getCountWhere('session_id', session_id()),
                'smallImgPath' => SMALL_IMG
            ]
        );
    }
}