<?php


namespace App\Controller\product\forms;

use App\Alert\session;
use App\Controller\other;
use App\Controller\Validator\ValidatorProduct;
use App\Models\product\forms\FormatModel;

class FormatController
{
    /**
     * @var array
     */
    private array $data = [];

    /**
     * @var FormatModel
     */
    private $model;

    /**
     * @var ValidatorProduct
     */
    private $validator;

    /**
     * @var array
     */
    private $session;



    /**
     * Constructor 
     * 
     * @param array $data
     */
    public function  __construct(array $data)
    {
        $this->data = $data;
        $this->format = new FormatModel($data);
        $this->validator = new ValidatorProduct($data);
    } 


    /**
     * Modifie le format
     * 
     * @param $id
     * @return array|null
     */
    public function updates ($id): ?array
    {

        if (isset($this->data['valided'])){

            $this->validator->isDanger(["title" , "legend" , "format"]);
            $this->validator->isExist('format', $this->format->FormatExist());
    
            if ($this->validator->isValid()) {
                
                if($this->format->FormatUpdate($id)){
                    $session = session::getInstance()->setFlash("success" , "Le format a été mis à jour");
                    other::redirect('/blog/format/Listing');
                }
            }

            return $this->validator->isMessage();
        }

        else{

            return null;
        }
    }

    /**
     * Ajouter un format dans la base de données
     * 
     * @return array|null
     */
    public function add (): ?array
    {
        if (isset($this->data['valided'])){

            $this->validator->isDanger(["title" , "legend" , "format"]);
            $this->validator->isExist('format' , $this->format->FormatExist());
            
            if ($this->validator->isValid()) {
                if($this->format->add()){
                    $session = session::getInstance()->setFlash("success" , "Vous avez ajouté un format ");
                    other::redirect('/blog/format/Listing');
                }
            }

            return $this->validator->isMessage();
        }

        else
        {
            return null;
        }

    }


    /**
     * Supprime un format dans la base de données 
     * 
     * @param int|null $id
     * 
     * @return void
     */
    public  function deletes (int $id = null)
    {
        if (isset($id) && !is_null($id)){

            if ($this->format->FormatDelete($id) == false){
                $session = session::getInstance()->setFlash("info" , "Une erreur est survenue ");
                other::redirect('/blog/format/Listing');
            }

            $session = session::getInstance()->setFlash("success" , " Vous avez supprimé un format ");
            other::redirect('/blog/format/Listing');
        }
    }
}