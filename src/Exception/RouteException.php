<?php

namespace App\Exception;


class RouteException extends \Exception {

    public function __construct($message = "" , $code = 0 , ?\Throwable $previous = null)
    {
        parent::__construct($message , $code , $previous);
    }

    
    /**
     * error404 met la status à 404 puis include le fichier 404.php
     * 
     * @return void
     */
    public function error404 ()
    {
        http_response_code(404);
        ob_start();
        require VIEWS . 'error' . DIRECTORY_SEPARATOR .  '404.php';
        $contentError = ob_get_clean();
        require VIEWS . 'layout' . DIRECTORY_SEPARATOR .  'error.php';
    }

}