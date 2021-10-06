<?php


namespace App\Controller\product\forms;

use App\Alert\session;
use App\Controller\other;
use App\Controller\Validator\ValidatorProduct;
use App\Models\product\forms\CategoriesModel;

class CategoriesController
{
    /**
     * @var array
     */
    private array $data = [];

    /**
     * @var CategoriesModel
     */
    private $categorie;

    /**
     * @var ValidatorProduct
     */
    private $validator;

    /**
     * @var [type]
     */
    private $session;



    /**
     * CategoriesController constructor.
     * @param array $data
     */
    public function  __construct(array $data)
    {
        $this->data = $data;
        $this->categorie = new CategoriesModel($data);
        $this->validator = new ValidatorProduct($data);
    }


    /**
     * @param $id
     * @return array|null
     */
    public function updates ($id): ?array
    {

        if (isset($this->data['valided'])){

            $this->validator->isDanger(["title" , "legend" , "categories"]);
            $this->validator->isExist('Categorie', $this->categorie->CategoriesExist());
    
            if ($this->validator->isValid()) {
                if($this->categorie->CategoriesUpdate($id)){
                    $session = session::getInstance()->setFlash("success" , "La categories a été mis à jour");
                    other::redirect('/blog/categories/Listing');
                }
            }

            return $this->validator->isMessage();
        }

        else{

            return null;
        }
    }

    /**
     * @return array|null
     */
    public function add (): ?array
    {
        if (isset($this->data['valided'])){

            $this->validator->isDanger(["title" , "legend" , "categories"]);
            $this->validator->isExist('Categorie' , $this->categorie->CategoriesExist());
            
            if ($this->validator->isValid()) {

                if($this->categorie->add()){
                    $session = session::getInstance()->setFlash("success" , "Vous avez ajouté une categorie ");
                    other::redirect('/blog/categories/Listing');
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
     * @param int|null $id
     * 
     * @return void
     */
    public  function deletes (int $id = null)
    {
        if (isset($id) && !is_null($id)){

            if ($this->categorie->CategoriesDelete($id) == false){
                $session = session::getInstance()->setFlash("info" , "Une erreur est survenue ");
                other::redirect('/blog/categories/Listing');
            }

            $session = session::getInstance()->setFlash("success" , " Vous avez supprimé une categorie ");
            other::redirect('/blog/categories/Listing');
        }
    }
}