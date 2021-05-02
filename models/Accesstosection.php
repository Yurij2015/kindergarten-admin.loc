<?php


class Accesstosection
{

    public static function getAccesstosectionList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT SectionId, RoleId FROM accesstosection');
        $accesstosectionList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $accesstosectionList[$i]['AccessId'] = $row['AccessId'];
            $accesstosectionList[$i]['SectionId'] = $row['SectionId'];
            $accesstosectionList[$i]['RoleId'] = $row['RoleId'];
            $i++;
        }
        return $accesstosectionList;
    }

    public static function getAccesstosectionById($accessId)
    {
        $accessId = (int)$accessId;
        if ($accessId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM accesstosection WHERE AccessId=$accessId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}