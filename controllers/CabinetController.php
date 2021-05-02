<?php


class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();
//        echo $userId;
        $user = User::getUserById($userId);
        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

    public function actionContactForm()
    {


    }


    public function actionEdit()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        $UserName = $user['UserName'];
        $password = $user['Password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $userName = $_POST['UserName'];
            $password = $_POST['Password'];

            $errors = false;


            if (!User::checkPassword($password)) {
                $errors[] = '';
            }

        }
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }


}