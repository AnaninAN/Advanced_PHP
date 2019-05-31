<?php

namespace app\model;

class Products extends Model {
    private $id;
    private $name;
    private $description;
    protected $price;

    public function getTableName() {
        return 'products';
    }

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }
}