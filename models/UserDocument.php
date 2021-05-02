<?php


class UserDocument
{
    public static function getUserDocumentList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT DocumentId, CreationDate, `Description`, DocumentScan, UserId FROM userdocuments');
        $attendanceList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $attendanceList[$i]['DocumentId'] = $row['DocumentId'];
            $attendanceList[$i]['CreationDate'] = $row['CreationDate'];
            $attendanceList[$i]['Description'] = $row['Description'];
            $attendanceList[$i]['DocumentScan'] = $row['DocumentScan'];
            $attendanceList[$i]['UserId'] = $row['UserId'];
            $i++;
        }
        return $attendanceList;
    }


    public static function getUserDocumentById($documentId)
    {
        $documentId = (int)$documentId;
        if ($documentId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM userdocuments WHERE DocumentId=$documentId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}