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

    public static function getCount(){
        $db = Db::getConnection();

        $sql = "SELECT id FROM `Details`";
        $result = $db->prepare($sql);
        $result->execute();

        return $result->rowCount();
    }

    public static function getList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT *  FROM  `Details` ORDER BY id');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($rows = $result->fetch()) {
            $list[$i]['id'] = $rows['id'];
            $list[$i]['name'] = $rows['name'];
            $i++;
        }

        return $list;
    }

    /*
     * Добавляем деталь
     */
    public static function setDetails($name){
        $db = Db::getConnection();
        $sql = "INSERT INTO `Details` (name) VALUES (:name)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
    }

    /*
     * Проверка на наличие такой детали в базе
     */
    public static function chekDetails($name){
        $db = Db::getConnection();

        $sql = "SELECT  id  FROM  `Details`  WHERE name = :name";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->execute();
        return $result->fetchColumn(0) > 0 ? true : false;
    }

    /*
     * Удаялем элемент
     */
    public static function delete($id){
        $db = Db::getConnection();
        $sql = "DELETE FROM `Details` WHERE id =  :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}