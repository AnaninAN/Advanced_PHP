<?php

namespace app\model\entities;

class Basket extends DataEntity
{
    public $id;
    public $session_id;
    public $product_id;

    public function __construct($session_id = null, $product_id = null) {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }
}