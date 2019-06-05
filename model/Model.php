<?php

namespace app\model;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function insert() {
        $tableName = $this->getTableName();
        foreach ($this as $key => $value) {
            print "$key => $value<br>";
        }
 
        //$sql = "INSERT INTO `products`(`name`, `description`, `price`) VALUES (:name, :description, :price)";
 
         //execute
         //$this->id = "lastID";
 
     }
 
     public function update() {
 
     }
 
     public function delete() {
 
     }
}