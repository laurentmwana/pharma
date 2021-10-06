<?php


namespace App\Controller;


class other {



    /**
     * @param string $path
     * 
     * @return [type]
     */
    public static function redirect (string $path , $code = 301)
    {
        header("location: $path" , true , $code);
        exit();
    }
}