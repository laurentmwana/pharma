<?php

namespace App\Controller\Modules;

use App\Controller\Controller;
use App\Controller\Helper\UrlHelper;
use App\Controller\pagination\pagination;
use App\Controller\product\forms\CategoriesController;
use App\Controller\product\forms\FormatController;
use App\Controller\product\forms\StockController;
use App\Controller\Helper;
use App\Controller\Helper\URL;
use App\Controller\other;
use App\Controller\Pagines\Pagine;
use App\Controller\product\forms\VendreController;
use App\Database\Database;
use App\Models\Model;

class blogModule  extends Controller{

    /**
     * @var CategoriesController
     */
    private $categories;

    /**
     * @var StockController
     */
    private $stock;
    
    /**
     * vente
     *
     * @var VendreController
     */
    private $vente;
    
    /**
     * @var FormatController
     */
    private $format;


    /**
     * Constructor 
     * 
     * @param Database $pdo
     */
    public function  __construct(Database $pdo)
    {
        parent::__construct($pdo);
        $this->categories = new CategoriesController($_POST);
        $this->stock = new StockController($_POST);
        $this->format = new FormatController($_POST);
        $this->vente = new VendreController($_POST);

    }

    public  function home ()
    {
        return $this->view('blog#home');
    }

    // stock function 
    public function addStock ()
    {
        // data for posts
        $add = $this->stock->add();
     
        return $this->view('blog#stock#add' , compact('add'));
    }


    /**
     * @param mixed $id
     * 
     * @return Controller
     */
    public function InfoStock ($id)
    {
        // data for posts
        $add = $this->stock->add();
        $info =Model::all('stock' , 'id = :id' , [':id' => $id]);
     
        return $this->view('blog#stock#info' , compact('info'));
    }

    public function DeleteStock ($id)
    {
        $delete = $this->stock->delete($id);
    }


    public function UpdateStock ($id)
    {
        $update = $this->stock->updates($id);
        $index =Model::all('stock' , 'id = :id' , [':id' => $id]);
        return $this->view('blog#stock#update' , compact('update' , 'index'));
    }

    /**
     * Listing du stock 
     * 
     * @return Controller
     */
    public function ListingStock ()
    {
        $req =Model::all('stock');
        $data = $req;
    
        return $this->view('blog#stock#listing' , compact('data'));
    }
    // end stock function 

    // Vente function 
    /**
     * @return Controller
     */
    public function addVente ()
    {
        // data for posts
        $add = $this->vente->add();
        return $this->view('blog#vente#add' , compact('add'));
    }


    /**
     * @param int $id
     * 
     * @return Controller
     */
    public function InfoVente (int $id)
    {
        $vente = Model::all('vendre' , 'id = :id' , [':id' => $id]);
        $stock = Model::all('stock' , 'id = :id' , [':id' => $vente[0]->stockid]);

        if ((is_array($vente) && is_array($stock)) && (!empty($stock) && !empty($vente))) {
            return $this->view('blog#vente#info' , compact('vente' , 'stock'));
        }

       
    }


    /**
     * @param int $id
     * 
     * @return Controller
     */
    public function UpdateVente (int $id)
    {
        // data for posts
        $index = Model::all('vendre', "id = :id" , [':id' => $id]);
        $update = $this->vente->Update($id);

        if (is_array($index) && !empty($index)) {
            return $this->view('blog#vente#update' , compact('index' , 'update'));
        }

        // other::redirect('error/404.php');
    }


    /**
     * @param int $id
     * 
     * @return Controller
     */
    public function DeleteVente (int $id)
    {
        $delete = $this->vente->delete($id);
    }

    public function ListingVente ()
    {
        $req =Model::all('stock');
        $data = $req;
        return $this->view('blog#vente#listing' , compact('data'));
    }
    // end Vente function



    // format function
    /**
     * @return Controller
     */
    public function addFormat ()
    {
        // data for posts
        $add = $this->format->add();
        return $this->view('blog#format#add' , compact('add'));
    }

    public function UpdateFormat ($id)
    {
        $update = $this->format->updates($id);
        $index =Model::all('format' , 'id = :id' , [':id' => $id]);
        return $this->view('blog#format#update' , compact('index' , 'update'));
    }

    /**
     * @return Controller
     */
    public function ListingFormat ()
    {

       $pagine = new Pagine('format');
       $data = $pagine->items();

        return $this->view('blog#format#listing' , compact('data'));
    }


    /**
     * @param int $id
     * 
     * @return Controller
     */
    public function DeleteFormat (int $id)
    {
        $delete = $this->format->deletes($id);
    }



    /**
     * @param int $id
     * 
     * @return Controller
     */
    public function InfoFormat (int $id)
    {
        $req =Model::all('format' , 'id = :id' , [':id' => $id]);
        $info = $req;

        return $this->view('blog#format#info' , compact('info'));
    }
    // end Format function


    // Categories function
    /**
     * @return Controller
     */
    public function addCategories ()
    {
        // data for posts
        $add = $this->categories->add();

        return $this->view('blog#Categories#add' , compact('add'));
    }


    /**
     * @param int $id
     * 
     * @return views
     */
    public function UpdateCategories (int $id)
    {
        $index =Model::all('categories' , 'id = :id' , [':id' => $id]);
        if ($index == true){
            $update = $this->categories->updates($id);

            return $this->view('blog#Categories#update' ,  compact('index' , 'update'));

        }

        else{
            return $this->view('error#404');
        }
    }



    /**
     * @return Controller
     */
    public function ListingCategories ()
    { 
        return $this->view('blog#Categories#listing');
    }


    /**
     * @param int $id
     * 
     * @return Controller
     */
    public function InfoCategories (int $id)
    {
        $req =Model::all('categories' , 'id = :id' , [':id' => $id]);
        $info = $req;

        return $this->view('blog#Categories#info' , compact('info'));
    }


    /**
     * @param int $id
     */
    public  function DeleteCategories (int $id)
    {
        $delete = $this->categories->deletes($id);
    }
    // end Categories function
}