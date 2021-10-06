<?php

namespace App\Models\product\forms;

use App\Database\Database;
use App\Models\Model;

class CategoriesModel extends Database
{
    /**
     * @var array
     */
    private $posts = [];

    public function __construct(array $posts){

        $this->posts = $posts;
    }

    /** ajouter une categorie
     * @return bool
     */
    public function add(): bool
    {

        $pdo = Model::insert('categories' ,'title = :title , legend = :legend ,
            categories = :categories, datecreate = NOW() ' ,
            [
                ":title" => $this->posts['title'],
                ":categories" => $this->posts['categories'],
                ":legend" => $this->posts['legend'],
            ]
        );

        if ($pdo == false){

            return false;

        }
        return true;
    }

    /** Verifie qu'il n' y a pas une categorie qui porte le meme nom que celle qu'on veut ajouter
     *
     * @return bool
     */
    public function CategoriesExist (): bool
    {
        $pdo = Model::exist('categories', " title = :title AND categories = :categories AND legend = :legend", [
            ":title" => $this->posts['title'],
            ":categories" => $this->posts['categories'],
            ":legend" => $this->posts['legend'],
        ]);

        if ($pdo == true){
            return true;
        }

        else{
            return false;
        }


    }


    /** Modification de la categorie
     * @param int $index l'id passer en parametre depuis le routeur
     * @return bool
     */
    public function CategoriesUpdate (int $index): bool
    {

        $update = Model::update('categories' , " title = :title , legend = :legend , 
        categories = :categories , updatedate = NOW() WHERE id = :index ", [
            ':index' => $index,
            ':title' => $this->posts['title'],
            ':legend' => $this->posts['legend'],
            ':categories' => $this->posts['categories'],
        ]);

        if ($update == true){
            return true;
        }

        else{
            return false;
        }
    }


    /** Supprission de la categorie
     * @param int $id l'id passer en parametre depuis le routeur
     * @return bool
     */
    public  function CategoriesDelete (int $id): bool
    {
        $delete = Model::all('categories' , 'id = :id' , [':id' => $id]);

        if (is_array($delete)){

            $pdo = Model::delete('categories', 'id = :id' , [':id' => $id]);
            if ($pdo == false){
                return false;
            }

            return true;
        }

    }
}


