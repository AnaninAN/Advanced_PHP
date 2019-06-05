<?php

require "../config/config.php";
require "../engine/Autoload.php";

use app\engine\Autoload;
use app\model\{Products, Users, Basket};

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Products("Бургер", "С говядиной", 250);

var_dump($product);
var_dump("<br>");
var_dump($product->insert());