<?php

namespace app\controllers;

use app\model\Products;

class ProductController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method))
            $this->$method();
        else
            echo "404";
    }

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $products = Products::getAll();
        echo $this->render('catalog', ['products' => $products]);
    }

    public function actionCard() {
        $id = $_GET['id'];
        $product = Products::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }

    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate(
                "layouts/{$this->layout}",
                ['content' => $this->renderTemplate($template, $params)]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        ob_start();
        extract($params);
        $fileName = TEMPLATES_DIR . $template . ".php";
        if (file_exists($fileName)) {
            include $fileName;
        } else
            echo "404";

        return ob_get_clean();
    }
}