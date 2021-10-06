<?php

use App\Controller\Helper\UrlHelper;
use App\Exception\RouteException;
use App\Router\Router;

require dirname(__DIR__) . '/vendor/autoload.php'; // require de l'autoload

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();



define('VIEWS' , dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS' , dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR);

$router = new \App\Router\Router($_GET['page']);
// les routes en get

$router 
    ->get('/' ,"App\Controller\Modules\BlogModule#home", 'home')

    // stock
    ->get('/blog/stock/add' ,"App\Controller\Modules\BlogModule#addStock" , 'addStock')
    ->get('/blog/stock/Listing' ,"App\Controller\Modules\BlogModule#ListingStock" , 'ListingStock')
    ->get('/blog/stock/Info/:id' ,"App\Controller\Modules\BlogModule#InfoStock" , 'InfoStock')
    ->get('/blog/stock/Update/:id' ,"App\Controller\Modules\BlogModule#UpdateStock" , 'UpdateStock')
    ->get('/blog/stock/Delete/:id' ,"App\Controller\Modules\BlogModule#DeleteStock" , 'DeleteStock')

    ->post('/blog/stock/add' ,"App\Controller\Modules\BlogModule#addStock" , 'addStock')
    ->post('/blog/stock/Update/:id' ,"App\Controller\Modules\BlogModule#UpdateStock" , 'UpdateStock')
    // end stock

    // vente
    ->get('/blog/Vente/add' ,"App\Controller\Modules\BlogModule#addVente" , 'addVente')
    ->get('/blog/Vente/Listing' ,"App\Controller\Modules\BlogModule#ListingVente" , 'ListingVente')
    ->get('/blog/Vente/Delete/:id' ,"App\Controller\Modules\BlogModule#DeleteVente" , 'DeleteVente')
    ->get('/blog/Vente/Update/:id' ,"App\Controller\Modules\BlogModule#UpdateVente" , 'UpdateVente')
    ->get('/blog/Vente/Info/:id' ,"App\Controller\Modules\BlogModule#InfoVente" , 'InfoVente')

    ->post('/blog/Vente/add' ,"App\Controller\Modules\BlogModule#addVente" , 'addVente')
    ->post('/blog/Vente/Update/:id' ,"App\Controller\Modules\BlogModule#UpdateVente" , 'UpdateVente')
    //end vente

    // categories
    ->get('/blog/categories/add' ,"App\Controller\Modules\BlogModule#addCategories" , 'addCategories')
    ->get('/blog/categories/Listing' ,"App\Controller\Modules\BlogModule#ListingCategories" , 'ListingCategories')
    ->get('/blog/categories/Update/:id' ,"App\Controller\Modules\BlogModule#UpdateCategories" , 'UpdateCategories')
    ->get('/blog/categories/Delete/:id' ,"App\Controller\Modules\BlogModule#DeleteCategories" , 'UpdateCategories')
    ->get('/blog/categories/info/:id' ,"App\Controller\Modules\BlogModule#InfoCategories" , 'UpdateCategories')

    ->post('/blog/categories/add' ,"App\Controller\Modules\BlogModule#addCategories" , 'addCategories')
    ->post('/blog/categories/Update/:id' ,"App\Controller\Modules\BlogModule#UpdateCategories" , 'UpdateCategories')
    // end categories


    // format
    ->get('/blog/format/add' ,"App\Controller\Modules\BlogModule#addFormat" , 'addFormat')
    ->get('/blog/format/Listing' ,"App\Controller\Modules\BlogModule#ListingFormat" , 'ListingFormat')
    ->get('/blog/format/Update/:id' ,"App\Controller\Modules\BlogModule#UpdateFormat" , 'UpdateFormat')
    ->get('/blog/format/Delete/:id' ,"App\Controller\Modules\BlogModule#DeleteFormat" , 'DeleteFormat')
    ->get('/blog/format/info/:id' ,"App\Controller\Modules\BlogModule#infoFormat" , 'infoFormat')

    ->post('/blog/format/add' ,"App\Controller\Modules\BlogModule#addformat" , 'addFormat')
    ->post('/blog/format/Update/:id' ,"App\Controller\Modules\BlogModule#UpdateFormat" , 'UpdateFormat')
    // end format

    ->get('/posts/vente/:id-:slug' , "Posts#vente" , 'vente')->with('id', '[0-9]+')->with('slug', '([a-z\-0-9]+)')
    ->get('/posts/stock/:id' ,"Posts#stock" , 'stock');


  
try {
    $router->run();
} catch (RouteException $th) {
    return $th->error404();
}



    


