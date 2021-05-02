<?php


class Categorie
{
    public static function getCategoryList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT CategorieId, CategoryTitle, RequestContent FROM categories');
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['CategorieId'] = $row['CategorieId'];
            $categoryList[$i]['CategoryTitle'] = $row['CategoryTitle'];
            $categoryList[$i]['RequestContent'] = $row['RequestContent'];
            $i++;
        }
        return $categoryList;
    }


    public static function getCategoryById($categoryId)
    {
        $categoryId = (int)$categoryId;
        if ($categoryId) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM categories WHERE CategorieId=$categoryId");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return true;
    }
}