<?php


class RequestType
{
    public static function getRequestTypesList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT RequestTypeId, Title, `Description` FROM requesttypes');
        $requestTypeList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $requestTypeList[$i]['RequestTypeId'] = $row['RequestTypeId'];
            $requestTypeList[$i]['Title'] = $row['Title'];
            $requestTypeList[$i]['Description'] = $row['Description'];
            $i++;
        }
        return $requestTypeList;
    }


    public static function getRequestTypeById($requestTypeId)
    {
        $requestTypeId = (int)$requestTypeId;
        if ($requestTypeId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM requesttypes WHERE RequestTypeId=$requestTypeId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}