<?php


class Attachment
{
    public static function getAttachmentById($attachmentId)
    {
        $attachmentId = (int)$attachmentId;
        if ($attachmentId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM attachments WHERE AttachmentId=$attachmentId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}