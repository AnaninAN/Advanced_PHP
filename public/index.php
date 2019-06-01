<?php

require "../engine/Autoload.php";

use app\engine\{Autoload, Db};
use app\model\{Products, Users, Cart};

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Products(new Db());
$user = new Users(new Db());

$cart = new Cart(new Db());

var_dump($product);
echo "<br>";
var_dump($user);
echo "<br>";
var_dump($cart);