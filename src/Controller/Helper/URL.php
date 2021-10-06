<?php


namespace App\Controller\Helper;

use Exception;

/**
 * Vérifie qu'un paramètre est définie 
 */
class URL extends UrlHelper{

    /**
     * Vérifie qu'un paramètre est définie  (paginate)
     * 
     * @param string $name
     * @param int $default
     * 
     * @return int
     */
    public static function getPaginate (string $name , ?int $default = null): ?int 
    {
        if(!isset($_GET[$name])){
            return $default;
        }

        else if (!filter_var($_GET[$name] , FILTER_VALIDATE_INT)) {
            Throw new Exception("Parametre $name n'est pas un entier ");
        }

        else {
            return (int)$_GET[$name];
        }
    }
}