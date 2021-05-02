<?php


class TimeTable
{
    public static function getTimeTableList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT RecordId, CreatinDate, DateFrom, DateTo, TimeFrom, TimeTo, ActivationTypeId, UserId FROM timetable');
        $timeTableItemList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $timeTableItemList[$i]['RecordId'] = $row['RecordId'];
            $timeTableItemList[$i]['CreatinDate'] = $row['CreatinDate'];
            $timeTableItemList[$i]['DateFrom'] = $row['DateFrom'];
            $timeTableItemList[$i]['DateTo'] = $row['DateTo'];
            $timeTableItemList[$i]['TimeFrom'] = $row['TimeFrom'];
            $timeTableItemList[$i]['TimeTo'] = $row['TimeTo'];
            $timeTableItemList[$i]['ActivationTypeId'] = $row['ActivationTypeId'];
            $timeTableItemList[$i]['UserId'] = $row['UserId'];
            $i++;
        }
        return $timeTableItemList;
    }


    public static function getTimeTableItemById($recordId)
    {
        $recordId = (int)$recordId;
        if ($recordId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM timetable WHERE RecordId=$recordId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}