<?php

namespace app\controllers;

use app\engine\Request;
use app\model\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionCatalog() {
        $page = (new Request())->getParams()['page'] ?: 0;
        $page++;
        $limit = $page * QUANTITY_CARD_CATALOG;
        $products = (new ProductRepository())->getLimit(0, $limit);
        echo $this->render(
            'catalog', [
                'products' => $products,
                'page' => $page,
                'smallImgPath' => SMALL_IMG
            ]
        );
    }

    public function actionCard() {
        $id = (new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('card', [
                'product' => $product,
                'imgName' => str_replace(".", "_1.", $product->src),
                'bigImgPath' => BIG_IMG
            ]
        );
    }
}