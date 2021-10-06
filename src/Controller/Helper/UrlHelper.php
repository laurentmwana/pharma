<?php

namespace App\Controller\Helper;

use App\Controller\other;

/**
 * Modifier l'url 
 */
class UrlHelper{

    /**
     * Définit un paramètre dans l'url 
     * 
     * @param string $params
     * @param string|int $value
     * 
     * @return string
     */
    public static function withParams ($params , $value): string
    {
        $data = $_GET;
        unset($data['page']);
        $query = http_build_query(array_merge($data , [$params => $value]));
        return  '?' . $query ;
    }
}