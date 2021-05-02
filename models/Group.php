<?php


class Group
{
    public static function getGroupList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT GroupId, `Description` FROM `groups`');
        $groupList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $groupList[$i]['GroupId'] = $row['GroupId'];
            $groupList[$i]['Description'] = $row['Description'];
            $i++;
        }
        return $groupList;
    }


    public static function getGroupById($groupId)
    {
        $groupId = (int)$groupId;
        if ($groupId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM `groups` WHERE GroupId=$groupId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}