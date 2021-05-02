<?php


class UserData
{
    public static function getUserDataList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT ProfileId, Phone, Phone2, Email, `Status`, Position, Gender, UserPhoto, UserId FROM userdata');
        $userDataList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $userDataList[$i]['ProfileId'] = $row['ProfileId'];
            $userDataList[$i]['Phone'] = $row['Phone'];
            $userDataList[$i]['Phone2'] = $row['Phone2'];
            $userDataList[$i]['Email'] = $row['Email'];
            $userDataList[$i]['Status'] = $row['Status'];
            $userDataList[$i]['Position'] = $row['Position'];
            $userDataList[$i]['Gender'] = $row['Gender'];
            $userDataList[$i]['UserPhoto'] = $row['UserPhoto'];
            $userDataList[$i]['UserId'] = $row['UserId'];
            $i++;
        }
        return $userDataList;
    }


    public static function getUserDataById($profileId)
    {
        $profileId = (int)$profileId;
        if ($profileId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM userdata WHERE ProfileId=$profileId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}