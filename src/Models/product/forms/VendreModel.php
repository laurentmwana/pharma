<?php


namespace App\Models\product\forms;

use App\Database\Database;
use App\Models\Model;

/**
 * Model de la vente 
 */
class VendreModel extends Database
{

    /**
     * Les informations poster par l'user
     * 
     * @var array
     */
    private $posts = [];


    /**
     * Constructor 
     * 
     * @param array $posts
     */
    public function __construct(array $posts = [])
    {
        $this->posts = $posts;
    }


    /**
     * Ajouter une ligne dans la base de données 
     * 
     * @return bool|null
     */
    public function add (): ?bool
    {
        $stock = Model::all('stock', "product = :p AND categories = :c AND format = :f AND carton >= 1 AND tpiece >= :piece", [
            ":p" => $this->posts['product'],
            ":c" => $this->posts['categories'],
            ":f" => $this->posts['format'],
            ":piece" => $this->posts['piece'],
        ]);

        if (is_array($stock) && !empty($stock)) {

            $pdo = Model::insert('vendre' , "stockid =:id ,  product = :product , categories = :categories , format = :format , 
            price = :price ,  piece = :piece ,
            datecreated = NOW(),  updatedate = NOW()", [
                ":id" => $stock[0]->id,
                ":product" => $this->posts['product'],
                ":categories" => $this->posts['categories'],
                ":format" => $this->posts['format'],
                ":price" => $this->posts['price'],
                ":piece" => $this->posts['piece'],
            ]);

           
            $tpiece = ((int)$stock[0]->tpiece - (int)$this->posts['piece']);
            $carton = round($tpiece / (int)$stock[0]->npcarton);
            $tpieces = $carton * (int)$stock[0]->npcarton;

            $updateStock = Model::update('stock', "carton = :carton , tpiece = :tpiece , updatedate = NOW() WHERE id = :id",[
                ":carton" => $carton,
                ":tpiece" => $tpieces,
                ":id" => $stock[0]->id
            ]);

            if ($pdo === true && $updateStock === true) {
                return true;
            }

            return false;
        }

        return null;


        // 4 , 7*4 = 28
    }


    /**
     * Supprime une ligne d'informations dans la table vente
     * 
     * @param int $id
     * 
     * @return bool|null
     */
    public  function VendreDelete (int $id): ?bool
    {
        $exist = Model::all('vendre' , 'id = :id' , [':id' => $id]);

        if (is_array($exist) && !empty($exist)){

            $delete = Model::delete('vendre', 'id = :id' , [':id' => $id]);
            if ($delete === false){
                return false;
            }

            return true;
        }

        return null;

    }


    /**
     * Modifie une ligne des produits vendus
     * 
     * @param mixed $id
     * 
     * @return bool|null
     */
    public function VendreUpdate ($id): bool
    {
        $vente = Model::all('vendre' , 'id = :id ' , [':id' => $id]);
        $stock = Model::all('stock' , 'id = :id AND tpiece >= 0 AND carton >= 0' , [':id' => $vente[0]->stockid]);

        if ((is_array($vente) && is_array($stock)) && (!empty($stock) && !empty($vente))) {
            
            $addition = ($stock[0]->tpiece + $vente[0]->piece);
            $tpiece = $addition - $this->posts['piece'];
            $carton = round($tpiece / $stock[0]->npcarton);
            $tpieces = $carton * $stock[0]->npcarton;

            if ($carton <= $stock[0]->carton && $tpiece <= $stock[0]->tpiece) {

                $updateStock = Model::update('stock', "carton = :carton , tpiece = :tpiece , updatedate = NOW() WHERE id = :id AND carton >= :carton AND tpiece >= :tpiece",[
                    ":carton" => $carton,
                    ":tpiece" => $tpieces,
                    ":id" => $stock[0]->id            
                ]);
    
                dd($updateStock);
    
                if ($updateStock === true) {
                    dd($updateStock);
                    $pdo = Model::update('vendre' , "product = :product , categories = :categories , format = :format , 
                    price = :price ,  piece = :piece ,
                    datecreated = NOW(),  updatedate = NOW() WHERE id = :index", [
                        ":product" => $this->posts['product'],
                        ":categories" => $this->posts['categories'],
                        ":format" => $this->posts['format'],
                        ":price" => $this->posts['price'],
                        ":piece" => $this->posts['piece'],
                        ":index" => $vente[0]->id
                    ]);
    
                    return true;
                } 
            }

           

            return false;
        }


        return false;
    }

    
}