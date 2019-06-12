<?php

namespace app\model;

class Products extends DbModel {
    
    public $id;
    public $name;
    public $description;
    public $price;
    public $src;

    public function __construct($name = null, $description = null, $price = null, $src = null) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->src = $src;
    }

    public static function getTableName() {
        return 'products';
    }
}