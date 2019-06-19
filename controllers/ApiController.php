<?php

namespace app\controllers;

use app\model\Products;

class ApiController extends Controller
{
    public function actionCatalog() {
        $page = $_GET['page'] ?: 0;
        $page++;
        $limit = $page * QUANTITY_CARD_CATALOG;
        $products = Products::getLimit(0, $limit);
        header('Content-Type: application/json');
        echo json_encode(['products' => $products], JSON_UNESCAPED_UNICODE);
    }
}