<?php


namespace App\Alert;


/**
 * [Description session]
 */
class session extends AlertMessage
{
    /**
     * @var array
     */
    private $data = [];

    static $instance = null;



    static function  getInstance ()
    {
        if (self::$instance == null) {
            self::$instance = new session();
        }

        return self::$instance;
    }


    
    public function __construct()
    {
        session_start();
    }


    /** Ajoute un message dans la session 
     * 
     * @param string $key
     * @param string $message
     * 
     * @return void 
     */
    public function setFlash ($key , $message): void
    {
        $_SESSION['flash'][$key] = $message;
    }

    
    /**
     * @return string
     */
    public  function  destroy (): string 
    {
        $flash = $_SESSION['flash'];
        unset($flash);
        return $flash;
    }

    /** vérifie que la session flash existe 
     * 
     * @return bool
     */
    private function hasFlash (): bool
    {
        return isset($_SESSION['flash']);
    }



    /**
     * @return array
     */
    private function getSession (): array
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }




    /**
     * @return void
     */
    public  function attach (): void 
    {
        $this->hasFlash() == true ? $this->key($this->getSession()) : null;
    }


    /**
     * @param array $data
     * 
     * @return void
     */
    public function key (array $data): void
    {

        foreach ($data as $key => $message){

            echo "<div class='alert alert-$key'>";
                echo $message;
            echo "</div>";
        }
      
    }
}