<?php

class UserController
{
    public function actionLogin()
    {
        $userName = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $userName = $_POST['UserName'];
            $password = $_POST['Password'];

            $errors = false;

            if (!User::checkPassword($password)) {
                $errors[] = '';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($userName, $password);
            if ($userId === false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = '';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet/");
            }

        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }

}
