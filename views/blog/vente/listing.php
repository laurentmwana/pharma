

<h1 class="text-black-50">Listage des produits vendus  </h1>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group m-4">
                <a href="/blog/vente/add" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="btn-group m-4">
                <a href="" class="btn btn-success shadow btn-sm"><i class="fa fa-print"></i></a>
                <a href="" class="btn btn-success shadow btn-sm"><i class="fa fa-info"></i></a>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-9">
        <?php
        $title = "vendre";
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
                <th class="text-black-50">Nombre de piece vendue</th>
                <th class="text-black-50">Action</th>
                <th class="text-black-50">Date de création</th>
            </tr>
        </theader>
        <tbody>
        <?php

        $paginate = new App\Controller\Pagines\Pagine($title);
        $items = $paginate->items();
        foreach ($items as $post) : 
        ?>
           <tr>
               <td>
                   #
               </td>
               <td><?= App\Controller\Helper\TextHelper::excerpt($post->product) ?></td>
               <td><?= App\Controller\Helper\TextHelper::excerpt($post->format)?></td>
               <td><?= App\Controller\Helper\TextHelper::excerpt($post->categories)?></td>
               <td><?= App\Controller\Helper\TextHelper::excerpt($post->price)?></td>
               <td><?= App\Controller\Helper\TextHelper::excerpt($post->piece)?></td>
               <td>
                    <div class="btn-group">
                        <a href="/blog/vente/delete/<?= $post->id  ?>" class="btn btn-success btn-sm"><i class="fa fa-trash"></i></a>
                        <a href="/blog/vente/Update/<?= $post->id  ?>" class="btn btn-success btn-sm "><i class="fa fa-edit"></i></a>
                        <a href="/blog/vente/info/<?= $post->id ?>" class="btn btn-success btn-sm" ><i class="fa fa-info"></i> </a>
                    </div> 
                </td>
               <td><?= $post->datecreated?></td>
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
                            <?= $paginate->previous('success') ?>  
                            </li>
                            <?php $paginate->Listing() ?>
                            <li class="page-item">
                            <?= $paginate->next('success') ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>