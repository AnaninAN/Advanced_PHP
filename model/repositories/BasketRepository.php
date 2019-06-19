<?php

namespace app\model\repositories;

use app\model\Repository;
use app\model\entities\Basket;

class BasketRepository extends Repository
{
    public function getBasket($session) {
        $sql = "SELECT p.id id_prod, b.id id_basket, b.session_id, p.name, p.description, p.price, p.src FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session";
        return $this->db->queryAll($sql, ['session' => $session]);
    }

    public function isBasket($session) {
        return $this->getBasket($session) ? true : false;
    }

    public function totalBasket($session) {
        $sql = "SELECT SUM(p.price) AS total FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session";
        return $this->db->queryAll($sql, ['session' => $session])[0];
    }

    public function getEntityClass() {
        return Basket::class;
    }

    public function getTableName() {
        return 'basket';
    }
}