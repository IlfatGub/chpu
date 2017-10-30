<?php

include_once ROOT . '/components/Db.php';
include_once ROOT . '/models/Details.php';

class Save
{
    const IMAGE_PATH = 'template/uploads/';
    /*
     * Сохраняем параметры цикла в таблицу
     */
    public static function getSave()
    {
        if (self::getCountSave()) {
            $db = Db::getConnection();

            $result = $db->query('SELECT *  FROM  `save` WHERE type IS NULL ORDER BY id_details');
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

    public static function getSaveByType()
    {
        if (self::getCountSave()) {
            $db = Db::getConnection();

            $result = $db->query('SELECT *  FROM  `save` WHERE type = 1 ORDER BY id_details');
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
    public static function saveFile(){
        $fileName = 'save.txt';
        $nameDEtails='';
        unlink($fileName);
        $create_file = fopen($fileName, "w");
        foreach (self::getSaveByType() as $item) {
            fwrite(
                $create_file,
                self::translit(ChpuFor::getName($item['id_for']))
                . "\r\n"
                . trim(ChpuFor::getCode($item['id_for']))
                . '('
                . str_replace(array('<strong>', '</strong>'), '',  trim(trim($item['text']), ','))
                . ')'
                . "\r\n" . "\r\n");
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

        $sql = "DELETE FROM save WHERE id_save = :id_save";

        $result = $db->prepare($sql);
        $result->bindParam(':id_save', $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
    }

    /*
     * Транслит
     */
    static function translit($s) {
        $s = (string) $s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
        return $s; // возвращаем результат
    }
}