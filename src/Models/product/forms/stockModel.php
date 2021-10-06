<?php
namespace App\Models\product\forms;

use App\Database\Database;
use App\Models\Model;

class  stockModel extends Database {

    /**
     * @var array
     */
    private $posts = [];

    private $message = [];

    public function __construct(array $posts){

        $this->posts = $posts;
    }

    /**
     * @return bool
     */
    public  function add(): bool
    {

        $tpiece = (int)$this->posts['carton'] * (int)$this->posts['npcarton'];

        $pdo = Model::insert('stock' , "  product = :product , categories = :categories , format = :format , 
        carton = :carton , price = :price , tpiece = :tpiece,
        npcarton = :npcarton , comment = :comment , datecreate = NOW(),  updatedate = NOW()", [
            
            ":product" => $this->posts['product'],
            ":categories" => $this->posts['categories'],
            ":format" => $this->posts['format'],
            ":carton" => $this->posts['carton'],
            ":price" => $this->posts['price'],
            ":tpiece" => $tpiece,
            ":npcarton" => $this->posts['npcarton'],
            ":comment" => $this->posts['comment'],
        ]);

        return $pdo == false ? false : true;
    }

    
    /**
     * Vérifie s'il existe un stock qui a les memes valeurs que celle qu'on vient d'enregistrer 
     * 
     * @return bool
     */
    public function StockExist (): bool
    {
        $pdo = Model::exist('stock', " product = :product AND format = :format AND categories = :categories", [
            ":product" => $this->posts['product'],
            ":format" => $this->posts['format'],
            ":categories" => $this->posts['categories'],
        ]);

        if ($pdo == true){
            return true;
        }

        else{
            return false;
        }
    }


    /** Modification du Stock
     * 
     * @param int $index l'id passer en parametre depuis le routeur
     * @return bool
     */
    public function StockUpdate (int $index): bool
    {
        $tpiece = (int)$this->posts['carton'] * (int)$this->posts['npcarton'];
        $update = Model::update('stock' , "  product = :product , categories = :categories , 
            carton = :carton , price = :price ,  format = :format , tpiece = :tpiece , 
            npcarton = :npcarton , comment = :comment , datecreate = NOW() , updatedate = NOW() WHERE id = :index ", [
            ':index' => $index,
            ":product" => $this->posts['product'],
            ":categories" => $this->posts['categories'],
            ":carton" => $this->posts['carton'],
            ":price" => $this->posts['price'],
            ":tpiece" => $tpiece,
            ":format" => $this->posts['format'],
            ":npcarton" => $this->posts['npcarton'],
            ":comment" => $this->posts['comment'],
        ]);

        if ($update == true){
            return true;
        }

        else{
            return false;
        }
    }


    /** Supprission du stock 
     * 
     * @param int $id l'id passer en parametre depuis le routeur
     * @return bool
     */
    public  function StockDelete (int $id): bool
    {
        $delete = Model::all('stock' , 'id = :id' , [':id' => $id]);

        if (is_array($delete)){

            $pdo = Model::delete('stock', 'id = :id' , [':id' => $id]);
            if ($pdo == false){
                return false;
            }

            return true;
        }

    }
}