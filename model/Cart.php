<?php

namespace app\model;

class Cart extends Products
{
    private $quantity;
    
    public function getTableName() {
        return 'cart';
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function addProduct(Products $product) {
        //Тело запроса
        //return ???
    }
}