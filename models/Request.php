<?php


class Request
{
    public static function getRequestList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT RequestId, FullName, Email, Phone, Message, `Date`, `Status`, UserId, RequestTypeId FROM requests');
        $requestsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $requestsList[$i]['RequestId'] = $row['RequestId'];
            $requestsList[$i]['FullName'] = $row['FullName'];
            $requestsList[$i]['Email'] = $row['Email'];
            $requestsList[$i]['Phone'] = $row['Phone'];
            $requestsList[$i]['Message'] = $row['Message'];
            $requestsList[$i]['Date'] = $row['Date'];
            $requestsList[$i]['Status'] = $row['Status'];
            $requestsList[$i]['UserId'] = $row['UserId'];
            $requestsList[$i]['RequestTypeId'] = $row['RequestTypeId'];
            $i++;
        }
        return $requestsList;
    }


    public static function getRequestById($requestId)
    {
        $requestId = (int)$requestId;
        if ($requestId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM requests WHERE RequestId=$requestId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}