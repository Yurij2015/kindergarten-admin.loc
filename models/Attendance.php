<?php


class Attendance
{
    public static function getAttendanceList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT AttendanceId, `Date`, `Status`, CheckInTime, DepartureTime, ChildId, CategorieId FROM attendances');
        $attendanceList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $attendanceList[$i]['AttendanceId'] = $row['AttendanceId'];
            $attendanceList[$i]['Date'] = $row['Date'];
            $attendanceList[$i]['Status'] = $row['Status'];
            $attendanceList[$i]['CheckInTime'] = $row['CheckInTime'];
            $attendanceList[$i]['DepartureTime'] = $row['DepartureTime'];
            $attendanceList[$i]['ChildId'] = $row['ChildId'];
            $attendanceList[$i]['CategorieId'] = $row['CategorieId'];
            $i++;
        }
        return $attendanceList;
    }


    public static function getAttendanceById($attendanceId)
    {
        $attendanceId = (int)$attendanceId;
        if ($attendanceId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM attendances WHERE AttendanceId=$attendanceId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}