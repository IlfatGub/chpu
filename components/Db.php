<?php

class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include_once($paramsPath);

        $dsn = "mysql:host=localhost;dbname=chpu";
        $db = new PDO($dsn, 'root', 'armagedon');
        $db->exec("set names utf-8");
        return $db;
    }
}