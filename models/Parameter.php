<?php

include_once ROOT . '/components/Db.php';

class Parameter
{
    private static function findById($id)
    {
        $db = Db::getConnection();
        $id = intval($id);

        $sql = "SELECT  *  FROM  `parameter`  WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $model = $result->fetch();
        return $model;
    }

    public static function getName($id)
    {
        $model = self::findById($id);
        return $model['name'];
    }

    public static function getListByForId($id)
    {
        $db = Db::getConnection();
        $id = intval($id);
        $sql = "SELECT  *  FROM  `parameter`  WHERE id_for = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $i = 0;
        while ($rows = $result->fetch()) {
            $list[$i]['id'] = $rows['id'];
            $list[$i]['code'] = $rows['code'];
            $list[$i]['name'] = $rows['name'];
            $list[$i]['ext'] = $rows['ext'];
            $i++;
        }

        return $list;
    }

    /*
     * Добавляем деталь
     */
    public static function setParameter($name, $code, $ext, $id_for)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO `parameter` (name, code, ext, id_for) VALUES (:name, :code, :ext, :id_for)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->bindParam(':code', $code);
        $result->bindParam(':ext', $ext);
        $result->bindParam(':id_for', $id_for);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
    }

    /*
     * Проверка на наличие такой детали в базе
     */
    public static function checkByCode($for, $code)
    {
        $db = Db::getConnection();

        $sql = "SELECT  id  FROM  `parameter`  WHERE code = :code and id_for = :id_for";

        $result = $db->prepare($sql);
        $result->bindParam(':code', $code);
        $result->bindParam(':id_for', $for);
        $result->execute();
        return $result->fetchColumn(0) > 0 ? true : false;
    }

    /*
     * Проверка на наличие такой детали в базе
     */
    public static function checkByName($for, $name)
    {
        $db = Db::getConnection();

        $sql = "SELECT  id  FROM  `parameter`  WHERE name = :name and id_for = :id_for";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->bindParam(':id_for', $for);
        $result->execute();
        return $result->fetchColumn(0) > 0 ? true : false;
    }

    /*
     * Удаялем элемент
     */
    public static function delete($id)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM `parameter` WHERE id =  :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /*
     * Обновляем занчние КОДА по АйДи
     */
    public static function updateById($id, $name, $code, $ext)
    {
        $db = Db::getConnection();
        $stmt = $db->prepare("UPDATE parameter set code = :code, name = :name, ext = :ext where id=:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':ext', $ext, PDO::PARAM_STR);
        $stmt->execute();
    }

}