<?php

namespace app\model;

class Users extends Model
{
    private $id;
    private $login;
    private $pass;

    public function getTableName() {
        return 'users';
    }

    public function getID() {
        return $this->id;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPass() {
        return $this->pass;
    }
}