<?php

namespace app\controllers;

use app\interfaces\IRenderer;
use app\model\repositories\BasketRepository;
use app\model\repositories\UserRepository;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;
    private $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function actionIndex() {
        echo $this->render('index');
    }

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method))
            $this->$method();
        else
           throw new \Exception("Action not found", 404);
    }

    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate(
                "layouts/{$this->layout}",
                [
                    'content' => $this->renderTemplate($template, $params),
                    'basket' => (new BasketRepository())->isBasket(session_id()),
                    'products' => (new BasketRepository())->getBasket(session_id()),
                    'total' => (new BasketRepository())->totalBasket(session_id())['total'],
                    'smallImgPath' => SMALL_IMG,
                    'count' => (new BasketRepository())->getCountWhere('session_id', session_id()),
                    'auth' => (new UserRepository())->isAuth(),
                    'username' => (new UserRepository())->getName()
                ]
            );
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }
}