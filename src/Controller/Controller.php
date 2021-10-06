<?php

namespace App\Controller;

use App\Database\Database;

class Controller  extends Database{

    protected $pdo;

    public function __construct(Database $pdo)
    {
        $this->pdo = $pdo;
    }


    /** Afficher le view en recuperant le bon view depuis le routeur
     * 
     * @param string $path chemin du ficher
     * @param array|null $params
     * @param array|null $posts
     */
    public function view (string $path , array $params = null )
    {
        ob_start();
        $path = str_replace('#' , DIRECTORY_SEPARATOR , $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout' . DIRECTORY_SEPARATOR . 'default.php';

    }
  
}