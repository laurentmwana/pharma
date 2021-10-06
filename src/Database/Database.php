<?php

namespace App\Database;

use Config\config;
use PDO;
use PDOStatement;
use PDOException;

/**
 * Database (base de données )
 */
class Database
{
    /**
     * @var PDO
     */
    private static $pdo;

    /**
     * @var array
     */
    private $allLimtoffset = [];


    


    /**
     * @param $statement
     * @param array $value
     * @return false|PDOStatement
     */
    public static function  prepare($statement, array $value)
    {
        $pdo = self::getPDO()->prepare($statement);
        $pdo->execute($value);

        if ($pdo == false) {
            return false;
        }
        return $pdo;
    }

    /**
     * @return PDO
     */
    public static function getPDO(): PDO
    {

        $username = config::DatabaseConfig()['username'];
        $host = config::DatabaseConfig()['host'];
        $pass = config::DatabaseConfig()['pass'];
        $dbname = config::DatabaseConfig()['dbname'];
        $option = config::DatabaseConfig()['option'];

        if ( self::$pdo == null) {
            $pdo = new PDO("mysql:host={$host};dbname={$dbname}", $username, $pass, $option);
            self::$pdo = $pdo;
        }

        return self::$pdo;
    }




}
