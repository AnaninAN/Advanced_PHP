<?php

namespace app\model;

use app\engine\Db;
use app\model\entities\DataEntity;

abstract class Repository
{
    protected $db;

    public function __construct() {
        $this->db = Db::getInstance();
    }

    public function getCount() {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName}";
        return $this->db->queryOne($sql)['count'];
    }

    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field` = :$field";
        return $this->db->queryOne($sql, ["$field" => $value])['count'];
    }

    public function getOneWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field` = :$field";
        return $this->db->queryObject($sql, ["$field"=>$value], $this->getEntityClass());
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function getLimit(int $from,int $limit) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT {$from}, {$limit}";
        return $this->db->queryAll($sql);
    }

    public function insert(DataEntity $entity) {
        $params = [];
        $colums = [];

        foreach ($entity as $key => $value) {
            if ($key === 'id') continue;
            $params[":{$key}"] = $value;
            $colums[] = "`{$key}`";
        }
        $colums = implode(", ", $colums);
        $values = implode(", ", array_keys($params));

        $tableName = $this->getTableName();

        $sql = "INSERT INTO {$tableName} ({$colums}) VALUES ({$values})";

        $this->db->execute($sql, $params);

        $entity->id = $this->db->lastInsertId();
    }

    public function update(DataEntity $entity) {
        $sets = [];

        foreach ($entity as $key => $value) {
            if ($key === 'id') continue;
            if (is_string($value))
                $sets[] = "`{$key}` = '$value'";
            else
                $sets[] = "`{$key}` = $value";
        }
        $sets = implode(", ", $sets);

        $tableName = $this->getTableName();

        $sql = "UPDATE {$tableName} SET {$sets} WHERE id = :id";

        $this->db->execute($sql, ['id' => $this->id]);
    }

    public function save(DataEntity $entity) {
        if (is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);
    }

    public function delete(DataEntity $entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, ['id' => $entity->id]);
    }
}