<?php

include_once ROOT . '/components/Db.php';

class Chpu
{
    const SHOW_BY_DEFAULT = 2;

    public static function getNewsList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT *  FROM  `chpu_operation` ORDER BY id DESC LIMIT 10');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($rows = $result->fetch()) {
            $newsList[$i]['id'] = $rows['id'];
            $newsList[$i]['id_operation'] = $rows['id_operation'];
            $newsList[$i]['code'] = $rows['code'];
            $newsList[$i]['name'] = $rows['name'];
            $i++;
        }

        return $newsList;

    }

    public static function getNewsItemById($id)
    {
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT *  FROM  `chpu_operation` WHERE id = ' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsItem = $result->fetch();

        return $newsItem;
    }


    public static function getDetails()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT *  FROM  `details` ORDER BY id');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($rows = $result->fetch()) {
            $list[$i]['id'] = $rows['id'];
            $list[$i]['name'] = $rows['name'];
            $i++;
        }

        return $list;
    }

    public static function getOperations()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT *  FROM  `chpu_for` ORDER BY id');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($rows = $result->fetch()) {
            $list[$i]['id'] = $rows['id'];
            $list[$i]['code'] = $rows['code'];
            $list[$i]['name'] = $rows['name'];
            $i++;
        }

        return $list;
    }

    public static function getParameter($id)
    {
        $db = Db::getConnection();
        $id = intval($id);

        $sql = "SELECT *  FROM  `parameter`  WHERE id_for = :id_for";

        $result = $db->prepare($sql);
        $result->bindParam(':id_for', $id);
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

    public static function setSave($detailsId, $forId, $text){
        $db = Db::getConnection();
        $detailsId = intval($detailsId);
        $forId = intval($forId);

        $sql = "INSERT INTO save (id_details, id_for, text) "
            . "VALUES (:id_details, :id_for, :text)";

        $result = $db->prepare($sql);
        $result->bindParam(':id_details', $detailsId, PDO::PARAM_INT);
        $result->bindParam(':id_for', $forId, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR);

        return $result->execute();
    }



    public static function getDetailsName($id){

        $db = Db::getConnection();
        $id = intval($id);

        $sql = "SELECT  name  FROM  `details`  WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $newsItem = $result->fetch();

        return $newsItem['name'];
    }
    public static function getForName($id){
        $db = Db::getConnection();
        $id = intval($id);

        $sql = "SELECT  name  FROM  `chpu_for`  WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $newsItem = $result->fetch();

        return $newsItem['name'];
    }
}