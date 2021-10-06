<?php

namespace App\Controller\Helper;


class TextHelper {

    public static function excerpt (string $content , int $limit = 8): string 
    
    {
        if (mb_strlen($content) <= $limit) {
            return $content;
        }
        return substr($content , 0 , $limit) . '...';
    }
}