<?php


class Role
{
    public static function getRolesList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT RoleId, RoleName, `Description` FROM roles');
        $roleList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $roleList[$i]['RoleId'] = $row['RoleId'];
            $roleList[$i]['RoleName'] = $row['RoleName'];
            $roleList[$i]['Description'] = $row['Description'];
            $i++;
        }
        return $roleList;
    }


    public static function getRoleById($roleId)
    {
        $roleId = (int)$roleId;
        if ($roleId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM roles WHERE RoleId=$roleId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}