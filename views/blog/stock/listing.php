

<h1 class="text-black-50">Listage du stock  </h1>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group m-4">
                <a href="/blog/stock/add" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i> </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="btn-group m-4">
                <a href="" class="btn btn-primary shadow btn-sm"><i class="fa fa-print"></i></a>
                <a href="" class="btn btn-primary shadow btn-sm"><i class="fa fa-info"></i></a>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-9">
        <?php

use App\Controller\Helper\TextHelper;
use App\Controller\Pagines\Pagine;
        $title = "stock";
        if (isset($params['data'])){
            $alert = new \App\Alert\AlertMessage($params['data']);
            $alert->message();
        }
        App\Alert\session::getInstance()->attach();
        ?>
    </div>

</div>

<hr>

<!-- Table qui va contenir tous les products vendus  -->
<div class="container">
    <table class="table table-hover table-bordered table-responsive table-striped">
        <theader>
            <tr>
                <th class="text-black-50">#</th>
                <th class="text-black-50">Nom</th>
                <th class="text-black-50">Format</th>
                <th class="text-black-50">Categorie</th>
                <th class="text-black-50">Prix d'achat </th>
                <th class="text-black-50">Nombre de carton</th>
                <th class="text-black-50">Piece par carton</th>
                <th class="text-black-50">Total de piece </th>
                <th class="text-black-50">Action</th>
                <th class="text-black-50">Date de création</th>
            </tr>
        </theader>
        <tbody>
        <?php

        $paginate = new Pagine($title);
        $items = $paginate->items();
        foreach ($items as $post) : 
        ?>
           <tr>
               <td>
                   #
               </td>
               <td><?= TextHelper::excerpt($post->product) ?></td>
               <td><?= TextHelper::excerpt($post->format)?></td>
               <td><?= TextHelper::excerpt($post->categories)?></td>
               <td><?= TextHelper::excerpt($post->price)?></td>
               <td><?= TextHelper::excerpt($post->carton)?></td>
               <td><?= TextHelper::excerpt($post->npcarton) ?></td>
               <td><?= TextHelper::excerpt($post->tpiece) ?></td>
               <td>
                    <div class="btn-group">
                        <a href="/blog/stock/delete/<?= $post->id  ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
                        <a href="/blog/stock/Update/<?= $post->id  ?>" class="btn btn-primary btn-sm "><i class="fa fa-edit"></i></a>
                        <a href="/blog/stock/info/<?= $post->id ?>" class="btn btn-primary btn-sm" ><i class="fa fa-info"></i> </a>
                    </div> 
                </td>
               <td><?= $post->datecreate?></td>
           </tr>

        <?php endforeach; ?>
        
        </tbody>
    </table>


    <div class="row m-3">
        <div class="col-md-3"></div>
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <nav aria-label="Standard pagination example">
                        <ul class="pagination pagination-sm">
                            <li class="page-item">
                            <?= $paginate->previous('primary') ?>  
                            </li>
                            <?php $paginate->Listing() ?>
                            <li class="page-item">
                            <?= $paginate->next('primary') ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>