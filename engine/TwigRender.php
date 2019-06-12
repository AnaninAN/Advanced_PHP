<?php

namespace app\engine;

use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{
    public function renderTemplate($template, $params = []) {
        $loader = new \Twig\Loader\FilesystemLoader('../twigtemplates');
        $twig = new \Twig\Environment($loader);

        $fileName = TWIG_TEMPLATES_DIR . $template . ".twig";
        echo $twig->render($fileName, $params);
    }
}