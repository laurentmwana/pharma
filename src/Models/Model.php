<?php


namespace App\Models;

use App\Database\Database;
use PDO;

class Model extends Database
{
    
    /** Retourne un tableau des elements de la Table 
     * 
     * @param string $table Nom de la table 
     * @param string|null $params Les parametres 
     * @param array $value  Les valeurs passer en parametre 
     * @param string $all mode de recuperation de champs 
     * @param string $query type de requete 
     * @param string $nameOrder Nom du champs à afficher 
     * @param string $order mode d'affichage 
     * 
     * @return array
     */
    public static function  all(string $table, ?string $params = null, array $value = [], string $all = '*', string $query = 'query', $nameOrder = 'id', $order = 'DESC'): array
    {

        if ($query == 'query' && $params == null) {

            $pdo = self::getPDO()->query("SELECT $all FROM $table  ORDER BY $nameOrder $order");
            return $pdo->fetchAll(PDO::FETCH_OBJ);
           
        }


        $pdo = self::prepare("SELECT $all FROM $table   WHERE $params ORDER BY $nameOrder $order", $value);
        return $pdo->fetchAll(PDO::FETCH_OBJ);
    }


    /** Modifier une valeur de la table
     * 
     * @param string $table  Nom de la table
     * @param string $params  Les parametres
     * @param array $value Les valeurs fournit dans les parametres
     * @return bool
     */
    public static function  update($table, $params, array $value = []): bool
    {
        $pdo = self::prepare("UPDATE $table SET  $params", $value);

        if ($pdo == false) {
            return false;
        }

        return true;
    }


    /** Supprime une value de la table
     * 
     * @param $table Nom de la table
     * @param $params  Les parametres
     * @param array $value les valeurs fournit dans les  parametres
     * @return bool
     */
    public static function  delete($table, $params, array  $value = []): bool
    {
        $pdo = self::prepare("DELETE FROM  $table WHERE $params ", $value);
        if ($pdo == false) {
            return false;
        } else {
            return true;
        }
    }


    /** Insertion d'un element dans la base données
     * 
     * @param $table table de la base de données
     * @param $params les parametres de la requete
     * @param array $value les valeurs des parametres fournit
     * 
     * @return bool
     */
    public static  function insert($table, $params, array  $value = []): bool
    {
        $pdo = self::prepare("INSERT INTO $table  SET $params", $value);

        if ($pdo == false) {
            return false;
        } else {
            return true;
        }
    }


    /** Verifier qu'il n'existe pas deux element qui ont les memes valeurs
     * 
     * @param string $table table de la base de données
     * @param string $params les parametres de la requete
     * @param array $value les valeurs des parametres fournit
     * 
     * @return array|null
     */
    public static function exist($table, $params, array  $value = [], $all = '*'): ?array
    {
        $pdo = self::all($table,  $params, $value, $all, 'prepare');

        if ($pdo) {
            return $pdo;
        } else{
            return null;
        }

    }


    /**
     * Retourner les nombres des elements dans une tables de base de données
     * 
     * @param string $tables Nom de la table
     * @param string $champs les champs 
     * 
     * @return int
     */
    public static function count(string $table, string $champs = '*', string $query = 'query', string $params  = null,  array $value = []): int
    {

        if ($query == 'query' && $params == null) {

            $pdo = self::getPDO()->query("SELECT COUNT($champs) FROM $table ");
            $count = $pdo->fetch(PDO::FETCH_NUM)[0];
            return $count;
        } else {
            $pdo = self::prepare("SELECT COUNT($champs) FROM $table  WHERE $params ", $value);
            $count = $pdo->fetch(PDO::FETCH_NUM)[0];
            return $count;
        }
    }


    
    public static function allLimitOffset ($table , $id = 'id' , $limit = 10 , $offset = 0 , $order = "DESC"): array
    {
        $items = self::getPDO()->query(
            "SELECT * FROM $table ORDER BY {$id} {$order}  LIMIT {$limit} OFFSET {$offset} "
        )->fetchAll(PDO::FETCH_OBJ);

        return $items;
    }
}