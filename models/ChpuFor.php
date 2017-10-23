<?php

include_once ROOT . '/components/Db.php';

class ChpuFor
{
    const STATUS_FOR_SERIAL = '1';

    private static function findModel($id){
        $db = Db::getConnection();
        $id = intval($id);

        $sql = "SELECT  *  FROM  `chpu_for`  WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $model = $result->fetch();
        return $model;
    }

    public static function getCode($id){
        $model = self::findModel($id);
        return $model['code'];
    }
    public static function getName($id){
        $model = self::findModel($id);
        return $model['name'];
    }
    public static function getType($id){
        $model = self::findModel($id);
        return $model['type'];
    }
}