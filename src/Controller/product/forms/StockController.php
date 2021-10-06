<?php

namespace App\Controller\product\forms;


use App\Alert\session;
use App\Controller\other;
use App\Controller\Validator\ValidatorProduct;
use App\Models\product\forms\stockModel;

class StockController
{
    /**
     * @var array
     */
    private array $data = [];

    /**
     * @var stockModel
     */
    private $stock;

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
        $this->stock = new stockModel($data);
        $this->validator = new ValidatorProduct($data);
    }


    /**
     * @param $id
     * @return array|null
     */
    public function updates ($id): ?array
    {

        if (isset($this->data['valided'])){

            $this->validator->isDanger([
                "product" , "categories"  , "format",  
                "carton" , "price"  , "npcarton"
            ]);
            
            $this->validator->isExist('stock', $this->stock->stockExist());
    
            if ($this->validator->isValid()) {
                if($this->stock->StockUpdate($id)){
                    $session = session::getInstance()->setFlash("success" , "Le stock a été mis à jour");
                    other::redirect('/blog/stock/Listing');
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

            $this->validator->isDanger([
                "product" , "categories"  , "format",  
                "carton" ,  "npcarton" 
            ]);
            
            $this->validator->isExist('stock' , $this->stock->StockExist());
            
            if ($this->validator->isValid()) {

                if($this->stock->add()){
                    $session = session::getInstance()->setFlash("success" , "Vous avez ajouté un stock ");
                    other::redirect('/blog/stock/Listing');
                }
            }

            return $this->validator->isMessage();
        } else {
            return null;
        }
    }


    /**
     * @param int|null $id
     * 
     * @return void
     */
    public  function delete (int $id = null)
    {
        if (isset($id) && !is_null($id)){

            if ($this->stock->StockDelete($id) == false){
                $session = session::getInstance()->setFlash("info" , "Une erreur est survenue ");
                other::redirect('/blog/stock/Listing');
            }

            $session = session::getInstance()->setFlash("success" , " Vous avez supprimé un stock ");
            other::redirect('/blog/stock/Listing');
        }
    }
}