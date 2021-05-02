<?php


class Report
{
    public static function getReportList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT ReportId, TemplateCreationDate, TemplateCode, UserId FROM reports');
        $reportsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $reportsList[$i]['ReportId'] = $row['ReportId'];
            $reportsList[$i]['TemplateCreationDate'] = $row['TemplateCreationDate'];
            $reportsList[$i]['TemplateCode'] = $row['TemplateCode'];
            $reportsList[$i]['UserId'] = $row['UserId'];
            $i++;
        }
        return $reportsList;
    }


    public static function getReportById($reportId)
    {
        $reportId = (int)$reportId;
        if ($reportId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM reports WHERE ReportId=$reportId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}