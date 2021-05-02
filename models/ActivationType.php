<?php


class ActivationType
{
    public static function getAtivationTypeList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT TypeId, TypeTitle FROM activationtype');
        $activationtypeList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $activationtypeList[$i]['TypeId'] = $row['TypeId'];
            $activationtypeList[$i]['TypeTitle'] = $row['TypeTitle'];
            $i++;
        }
        return $activationtypeList;
    }

    public static function getAtivationTypeById($typeId)
    {
        $typeId = (int)$typeId;
        if ($typeId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM activationtype WHERE TypeId=$typeId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}