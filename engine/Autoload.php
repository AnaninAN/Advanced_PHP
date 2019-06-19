<?php

namespace app\engine;

class Autoload
{
    private $cut = ["app\\", "\\"];
    private $past = [DIR_ROOT . DS . ".." . DS, DS];
    
    public function loadClass($className) {
        $fileName = str_replace($this->cut, $this->past, $className) . ".php";
        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}