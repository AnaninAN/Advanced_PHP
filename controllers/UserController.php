<?php

namespace app\controllers;

use app\engine\Request;
use app\model\repositories\UserRepository;

class UserController extends Controller
{
    public function actionLogin() {
        //Авторизуем пользователя
        if (isset((new Request())->getParams()['submit'])) {
            $login = (new Request())->getParams()['login'];
            $pass = (new Request())->getParams()['pass'];
            if (!(new UserRepository())->auth($login, $pass)) {
                Die("Не верный пароль!");
            } else
                header("Location: /");
            exit();
        }
    }
    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }
}