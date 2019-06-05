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
        $keyString = '';
        $valueString = '';
        $arrayValues = [];
        foreach ($this as $key => $value) {
            if ($key !== 'id' && $key !== 'db') {
                $keyString .= sprintf("%s,",$key);
                $valueString .= sprintf(":%s,",$key);
                $arrayValues[$key] = $value;
            }
        }
        $keyString = substr($keyString, 0, -1);
        $valueString = substr($valueString, 0, -1);
        $sql = "INSERT INTO {$tableName}({$keyString}) VALUES ({$valueString})";
 
        $this->db->execute($sql, $arrayValues);
     }
 
     public function update() {
 
     }
 
     public function delete() {
 
     }
}