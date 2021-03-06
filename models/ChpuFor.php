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
    public static function getCount(){
        $db = Db::getConnection();

        $sql = "SELECT id FROM `chpu_for`";
        $result = $db->prepare($sql);
        $result->execute();

        return $result->rowCount();
    }


    public static function getList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT *  FROM  `chpu_for` ORDER BY id');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($rows = $result->fetch()) {
            $list[$i]['id'] = $rows['id'];
            $list[$i]['name'] = $rows['name'];
            $list[$i]['code'] = $rows['code'];
            $i++;
        }

        return $list;
    }

    /*
     * Добавляем деталь
     */
    public static function setFor($name, $code){
        $db = Db::getConnection();
        $sql = "INSERT INTO `chpu_for` (name, code, type) VALUES (:name, :code, NULL )";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->bindParam(':code', $code);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
    }

    /*
     * Проверка на наличие такой детали в базе
     */
    public static function chekForbyCode($code){
        $db = Db::getConnection();

        $sql = "SELECT  COUNT(*)  FROM  `chpu_for`  WHERE code = :code";

        $result = $db->prepare($sql);
        $result->bindParam(':code', $code);
        $result->execute();
        return $result->fetchColumn(0) > 0 ? true : false;
    }

    /*
     * Удаялем элемент
     */
    public static function delete($id){
        $db = Db::getConnection();
        $sql = "DELETE FROM `chpu_for` WHERE id =  :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}