<?php

namespace App\Controller\Validator;


class ValidatorProduct {

    /**
     * @var array
     */
    private $message = [];

    /**
     * @var array
     */
    private $data = [];


    /** Constructor 
     * 
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    /**
     * @param mixed $field
     * 
     * @return bool
     */
    private  function isEmpty ($field): bool
    {
        $fields = trim($field);

        if (empty($this->getField($fields))) {
            return true;
            
        }
        return false;
    }


    /**
     * Ecrire un message d'erreur 
     * 
     * @param string $message
     * @param string $motif
     * @param string $type
     * 
     * @return void
     */
    public function message(string $message , string $motif , string $type = 'danger'): void
    {
        $this->message[$type][$motif] = $message;
    }



    /**
     * @param mixed $field
     * 
     * @return string|null
     */
    private function getField ($field): ?string
    {
        if (!isset($this->data[$field])) {
           return null;
        }

        return $this->data[$field];
    }

    /**
     * @param mixed $field
     * 
     * @return bool
     */
    private function isMatch ($field): bool
    {
        if (preg_match('/^[a-zA-Z0-9_]+$/' , $this->getField($field))) {
            return true;
        }

        return false;
    }


    /**
     * @return bool
     */
    public function isValid ()
    {
        return empty($this->message);
    }



    /**
     * @return array
     */
    public function isMessage ()
    {
        return $this->message;
    }



    /**
     * @param string $name
     * @param bool $existe
     * @param string $message
     * 
     * @return void
     */
    public function isExist (string $name , bool $existe , string $message = "")
    {
        if ($existe == true) {
            $this->message['danger'][$name] = "Ce $name existe déjà";
        }
    }


    /**
     * @param string $title
     * @param string $legend
     * @param string $categorie
     * 
     * @return void
     */
    public function isDanger (array $data, $type = 'danger')
    {
        foreach ($data as $champs) {
           if ($this->isEmpty($champs)) {
                $this->message[$type][$champs] =  "Le champs $champs est vide ";
           } else {
                if ($this->isMatch($champs) == false) {
                    $this->message[$type][$champs] = "Le $champs n'est pas valide (alphanumerique)";
                }
           }
        }

    }
}