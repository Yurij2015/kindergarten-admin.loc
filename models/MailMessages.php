<?php


class MailMessages
{
    public static function getMailMessageList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT MessageId, `Subject`, `Date`, Message, `Status`, Sender_UserId, Recepient_UserId, AttachmentId FROM mailmessages');
        $mailMessageList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $mailMessageList[$i]['MessageId'] = $row['MessageId'];
            $mailMessageList[$i]['Subject'] = $row['Subject'];
            $mailMessageList[$i]['Date'] = $row['Date'];
            $mailMessageList[$i]['Message'] = $row['Message'];
            $mailMessageList[$i]['Status'] = $row['Status'];
            $mailMessageList[$i]['Sender_UserId'] = $row['Sender_UserId'];
            $mailMessageList[$i]['Recepient_UserId'] = $row['Recepient_UserId'];
            $mailMessageList[$i]['AttachmentId'] = $row['AttachmentId'];
            $i++;
        }
        return $mailMessageList;
    }


    public static function getMailMessagesById($mailMessageId)
    {
        $mailMessageId = (int)$mailMessageId;
        if ($mailMessageId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM mailmessages WHERE MessageId=$mailMessageId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}