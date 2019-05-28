<?php

//список товаров
class Item {

    protected $title;
    protected $price;
    protected $src;

    public function __construct($title, $price, $src) {
        $this->title = $title;
        $this->price = $price;
        $this->src = $src;
    }

    public function render() {
        //Метод для отображения элемента товара
    }

    public function info() {
        //Метод для отображения информации о товаре
    }
}

class ItemList {

    protected $items;

    public function __construct(array $items = []) {
        $this->items = $items;
    }

    public function getItems() {
        //Метод получения списка товаров (например, из БД)
    }
    
    public function render() {
        //Метод для отображения списка товаров
    }
}

//корзина
class CartItem extends Item {

    protected $quantity;

    public function __construct($title, $price, $src, $quantity) {
        $this->quantity = $quantity;
        parent::__construct($title, $price, $src);
    }

    public function render() {
        //Метод для отображения элемента корзины товаров
    }

    public function totalSum() {
        //Метод для подсчета общей суммы елемента товара ($price * $quantity)
    }
}

class CartList {

    protected $cart;
    
    public function __construct(array $cart = []) {
        $this->cart = $cart;
    }

    public function render() {
        //Метод для отображения товаров в корзине
    }

    public function addItemCart() {
        //Метод добавления товара в корзину
    }

    public function delItemCart() {
        //Метод удаления товара из корзины
    }

    public function infoCart() {
        //Метод для отображения информации общего количества и суммы всех товаров (Всего товаров...)
    }
}