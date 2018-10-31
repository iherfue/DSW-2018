<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=misc;charset=utf8', '', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
