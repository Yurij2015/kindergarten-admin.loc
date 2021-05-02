<?php


class ChildProfile
{
    public static function getChildProfilesList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT ChildId, FullName, ChildPhoto, ChildGender, DateOfBirth, `Status`, TypeRelation, StartDate, ComleteDate, GroupId, UserId FROM childprofile');
        $childProfileList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $childProfileList[$i]['ChildId'] = $row['ChildId'];
            $childProfileList[$i]['FullName'] = $row['FullName'];
            $childProfileList[$i]['ChildPhoto'] = $row['ChildPhoto'];
            $childProfileList[$i]['ChildGender'] = $row['ChildGender'];
            $childProfileList[$i]['DateOfBirth'] = $row['DateOfBirth'];
            $childProfileList[$i]['Status'] = $row['Status'];
            $childProfileList[$i]['TypeRelation'] = $row['TypeRelation'];
            $childProfileList[$i]['StartDate'] = $row['StartDate'];
            $childProfileList[$i]['ComleteDate'] = $row['ComleteDate'];
            $childProfileList[$i]['GroupId'] = $row['GroupId'];
            $childProfileList[$i]['UserId'] = $row['UserId'];
            $i++;
        }
        return $childProfileList;
    }


    public static function getChildProfileById($childId)
    {
        $childId = (int)$childId;
        if ($childId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM childprofile WHERE ChildId=$childId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}