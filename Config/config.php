<?php

namespace Config;

use PDO;

class config 
{
    const DBNAME = 'pharma';
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const OPTION = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    public static function DatabaseConfig () : array
    {
        return [
            'username' => self::USERNAME,
            'pass' => self::PASSWORD,
            'host' => self::HOST,
            'dbname' => self::DBNAME,
            'option' => self::OPTION
        ];
    }
}