<?php

class DBConnector
{
    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_NAME = 'travel';
    const DB_CHARSET = 'utf8';
    const DB_USER = 'root';
    const DB_PASS = '';

    private static $connection = null;

    public static function getConnection()
    {
        if (self::$connection === null) {
            $dsn = self::DB_DRIVER . ':host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=' . self::DB_CHARSET;
            self::$connection = new PDO($dsn, self::DB_USER, self::DB_PASS);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$connection;
    }

    private function __construct()
    {
    }

    private function __wakeup()
    {
    }

    private function __clone()
    {
    }
}