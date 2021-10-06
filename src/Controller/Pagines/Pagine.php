<?php

namespace App\Controller\Pagines;

use App\Controller\Helper\URL;
use App\Controller\Helper\UrlHelper;
use App\Database\Database;
use App\Models\Model;

/**
 * Fait la pagination des produits 
 * 
 */
class  Pagine
 {

    /**
     * Nom de la Table qu'on souhaite paginé
     * 
     * @var string
     */
    private  $table;

    /**
     *  Current page (données passer en paramètre ) ou première page 
     * 
     * @var int
     */
    private  $current;


    /**
     *  Nombre par page 
     * 
     * @var int
     */
    protected int $perPage;


    /**
     * Les nombres des produits 
     * 
     * @var int 
     */
    private  $count = null;

    /**
     * Constructor 
     * 
     * @param string $table
     * @param int $current
     * @param string $this->linkss
     */
    public function __construct(string $table)
    {
        $this->table = $table;
        $this->perPage = 8;
        $this->current = $this->getParams(URL::getPaginate('p' , 1));
    }

    /**
     * pagine après la pagination
     * 
     * @return array
     */
    public function items (): array 
    { 
        $offset = $this->offset();
        $limit = $this->perPage;
        $table = $this->table;
        $data = Model::allLimitOffset($table , 'id' , $limit , $offset);
        return $data;
    }

 

    /**
     * Pagine vers la page précedente
     * 
     * @return string
     */
    public function previous (string $class) : string 
    {
        $page = $this->current;
        $pages = $this->getPages();
        if($page > 1 && $pages > 1){
            $links = UrlHelper::withParams('p' ,($page - 1));
            return "<a href='{$links}' class='btn btn-{$class} btn-sm'>&laquo; </a>";
        } 
        return '';
    }


    /**
     * pagine vers la page suivante 
     * 
     * @return string
     */
    public function next (string $class) : string 
    {
        $page = $this->current;
        $pages = $this->getPages();
        $links = UrlHelper::withParams('p' ,($page + 1));
        if(($pages > $page && $page <= $pages)){
            return "<a href='{$links}' class='btn btn-{$class} btn-sm'>&raquo; </a>";
        } 
        return '';

    }

    /**
     * offset 
     * 
     * @return int
     */
    private function offset (): int 
    {
        $offset = $this->perPage * ($this->current - 1);
        if ($offset < 0) {
            $offset = $offset * (-1);
        }
        return $offset;
    }


    /**
     * Nombres total des pages 
     * 
     * @return int
     */
    private function getPages (): int
    {
        if ($this->count == null) {
            $this->count = (Model::count($this->table) / $this->perPage);
        }
        return ceil($this->count);
    } 


    /**
     *  Pagination par numero 
     * 
     * @param mixed $data
     * 
     * @return string
     */
    public function Listing (): void
    {
        $pages = $this->getPages();
        $page = $this->current;

        if ($pages > 1) {
            for ($i = 1 ; $i <= $pages ; $i++) {
                $links = URL::withParams('p' , $i); 
                $active = ($page == $i) ? 'active' : '';
                echo "<li class='page-item {$active}'> <a class='page-link ' href='$links'>$i</a></li>"; 
            }
        }
    }

    /**
     * Vérifie que le paramétre n'est pas superieur de nombres de pages 
     * 
     * @param mixed $page
     * 
     * @return int
     */
    private function getParams ($page) : int 
    {
        $pages = $this->getPages();
        $data = $page;

        if($page > $pages){
            $data = $pages;
        }
        return $data;
    }


}