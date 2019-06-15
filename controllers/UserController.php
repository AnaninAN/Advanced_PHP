<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13.06.2019
 * Time: 0:57
 */

namespace app\controllers;

use app\model\Users;

class UserController extends Controller
{
    public function actionLogin() {
        //Авторизуем пользователя
        //Переделать на Request !!!!
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (!Users::auth($login, $pass)) {
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