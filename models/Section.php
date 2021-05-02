<?php


class Section
{
    public static function getSectionsList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT SectionId, SectionTitle FROM sections');
        $attendanceList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $attendanceList[$i]['SectionId'] = $row['SectionId'];
            $attendanceList[$i]['SectionTitle'] = $row['SectionTitle'];
            $i++;
        }
        return $attendanceList;
    }


    public static function getSectionById($sectionId)
    {
        $sectionId = (int)$sectionId;
        if ($sectionId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM sections WHERE SectionId=$sectionId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}