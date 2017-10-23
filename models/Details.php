<?php

include_once ROOT . '/components/Db.php';

class Details
{
    private static function findById($id){
        $db = Db::getConnection();
        $id = intval($id);

        $sql = "SELECT  *  FROM  `Details`  WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $model = $result->fetch();
        return $model;
    }

    public static function getName($id){
        $model = self::findById($id);
        return $model['name'];
    }

}