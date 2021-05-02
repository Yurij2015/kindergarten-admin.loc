<?php

class User
{

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkUserName($userName)
    {
        return strlen($userName) >= 2;
    }

    /**
     * Проверяет пароль: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        return strlen($password) >= 6;
    }

    public static function checkUserExists($userName)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE UserName = :UserName';

        $result = $db->prepare($sql);
        $result->bindParam(':UserName', $userName, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    /**
     * Проверяем существует ли пользователь с заданными $UserName и $Password
     * @param string $userName
     * @param string $password
     * @return mixed : integer user id or false
     */
    public static function checkUserData($userName, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE UserName = :UserName AND Password = :Password';

        $result = $db->prepare($sql);
        $result->bindParam(':UserName', $userName, PDO::PARAM_INT);
        $result->bindParam(':Password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    /**
     * Запоминаем пользователя
     * @param $userId
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }


    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Returns user by id
     * @param integer $userId
     * @return mixed
     */
    public static function getUserById($userId)
    {
        if ($userId) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM users WHERE UserId = :UserId';
            $result = $db->prepare($sql);
            $result->bindParam(':UserId', $userId, PDO::PARAM_INT);
            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
    }

}