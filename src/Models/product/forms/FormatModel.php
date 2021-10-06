<?php


namespace App\Models\product\forms;


use App\Database\Database;
use App\Models\Model;

class formatModel extends Database
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
    public  function add(): bool
    {

        $pdo = Model::insert('format' ,'title = :title , legend = :legend ,
            format = :format, datecreate = NOW() ' ,
            [
                ":title" => $this->posts['title'],
                ":format" => $this->posts['format'],
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
    public function FormatExist (): bool
    {
        $pdo = Model::exist('format', " title = :title AND format = :format AND legend = :legend", [
            ":title" => $this->posts['title'],
            ":format" => $this->posts['format'],
            ":legend" => $this->posts['legend'],
        ]);

        if ($pdo == true){
            return true;
        }

        else{
            return false;
        }


    }


    /** Modification du format
     * 
     * @param int $index l'id passer en parametre depuis le routeur
     * @return bool
     */
    public function FormatUpdate (int $index): bool
    {

        $update = Model::update('format' , " title = :title , legend = :legend , 
        format = :format , updatedate = NOW() WHERE id = :index ", [
            ':index' => $index,
            ':title' => $this->posts['title'],
            ':legend' => $this->posts['legend'],
            ':format' => $this->posts['format']
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
    public  function FormatDelete (int $id): bool
    {
        $delete = Model::all('format' , 'id = :id' , [':id' => $id]);

        if (is_array($delete)){

            $pdo = Model::delete('format', 'id = :id' , [':id' => $id]);
            if ($pdo == false){
                return false;
            }

            return true;
        }

    }
}


