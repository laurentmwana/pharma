<?php

namespace App\Controller\product\forms;

use App\Alert\session;
use App\Controller\other;
use App\Controller\Validator\ValidatorProduct;
use App\Models\product\forms\VendreModel;

/**
 * Controller vendre pour la partie vente 
 */
class VendreController 
{

    /**
     * Les informations poster par l'user
     * 
     * @var array
     */
    private $posts = [];

    /**
     * @var ValidatorProduct
     */
    private $validator;


    /**
     * @var VendreModel
     */
    private $vente;

    /**
     * Constructor 
     * 
     * @param array $posts
     */
    public function __construct(array $posts)
    {
        $this->posts = $posts;
        $this->validator = new ValidatorProduct($posts);
        $this->vente = new VendreModel($posts);
    }


    /**
     * Ajoute une ligne d'informations à la table vendre 
     * 
     * @return array|null
     */
    public function add (): ?array
    {
        if (isset($this->posts['valided'])) {
           
            $this->validator->isDanger([
                "product" , "format" , "categories",
                "piece" , "price"
            ]);


            if ($this->validator->isValid()) {
                $add = $this->vente->add();
                if ($add === true) {
                    $session = session::getInstance()->setFlash("success" , "vous avez vendu un produit ");
                    other::redirect('/blog/vente/Listing');
                }   elseif  ($add === false){
                    $this->validator->message("une erreur est survenue " , "false-vente");
                } else {
                    $this->validator->message("Ce stock n'existe pas" , "null-vente");
                }
            }




            return $this->validator->isMessage();
        }

        return null;
    }


    /**
     * Delete une ligne d'informations
     * 
     * @param mixed $id
     * 
     * @return void
     */
    public function delete ($id): void
    {
        if (isset($id) && !is_null($id)){

            if ($this->vente->VendreDelete($id) === false){
                $session = session::getInstance()->setFlash("info" , "Une erreur est survenue ");
                other::redirect('/blog/vente/Listing');
            }

            $session = session::getInstance()->setFlash("success" , " Vous avez supprimé un produit vendu ");
            other::redirect('/blog/vente/Listing');
        }
    }


    /**
     * @param int $id
     * 
     * @return array|null
     */
    public function Update (int $id): ?array
    {
        if (isset($this->posts['valided'])){

            $this->validator->isDanger([
                "product" , "format" , "categories",
                "piece" , "price"
            ]);
            if ($this->validator->isValid()) {
                $update = $this->vente->VendreUpdate($id);
                if($update === true){
                    $session = session::getInstance()->setFlash("success" , "Le produit a été mis à jour");
                    other::redirect('/blog/vente/Listing');
                } elseif  ($update === false){
                    $this->validator->message("une erreur est survenue " , "false-vente");
                } else {
                    $this->validator->message("Ce stock n'existe pas" , "null-vente");
                }
            }

            return $this->validator->isMessage();
        }

        return null;
    }




}