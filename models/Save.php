<?php

include_once ROOT . '/components/Db.php';

class Save
{
    /*
     * Сохраняем параметры цикла в таблицу
     */
    public static function getSave()
    {
        if (self::getCountSave()) {
            $db = Db::getConnection();

            $result = $db->query('SELECT *  FROM  `save` ORDER BY id_details');
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $i = 0;
            while ($rows = $result->fetch()) {
                $list[$i]['id'] = $rows['id'];
                $list[$i]['id_details'] = $rows['id_details'];
                $list[$i]['id_for'] = $rows['id_for'];
                $list[$i]['text'] = $rows['text'];
                $i++;
            }
        } else {
            $list = null;
        }

        return $list;
    }

    /*
     * Получаем количество записей в таблице
     */
    public static function getCountSave()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM `save`');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    /*
     * Запись файла
     */
    public static function saveFile($save){
        $fileName = 'save.txt';
        unlink($fileName);
        $create_file = fopen($fileName, "w");
        foreach ($save as $item) {
            fwrite($create_file, trim(ChpuFor::getCode($item['id_for']), PHP_EOL) . ' - ' . $item['text'] . PHP_EOL);
        }
        fclose($create_file);
    }

    /*
     * Скачиваем файл
     */
    public static function downloadFile($file = "save.txt")
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }

    /*
     * Очистка таблицы
     */
    public static function clear(){
        $db = Db::getConnection();
        $result = $db->query('TRUNCATE  TABLE `save`');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
    }

    /*
     * Удаляем строку
     */
    public static function delete($id){
        $db = Db::getConnection();
        $id = intval($id);

        $sql = "DELETE FROM save WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $newsItem = $result->fetch();
    }
}