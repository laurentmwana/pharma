


<h1 class="text-black-50">Information du stock   </h1>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="/blog/stock/Add" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i> </a>
                <a href="/blog/stock/delete/<?= $params['info'][0]->id ?>" class="btn btn-primary shadow btn-sm"><i class="fa fa-trash"></i></a>
                <a href="/blog/stock/update/<?= $params['info'][0]->id ?>" class="btn btn-primary shadow btn-sm"><i class="fa fa-edit"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="/blog/stock/listing" class="btn btn-primary shadow btn-sm"><i class="fa fa-table"></i></a>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="" class="btn btn-primary shadow btn-sm"><i class="fa fa-print"></i></a>
            </div>
        </div>
    </div>
</div>


<hr>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card bg-light shadow-lg">
                <div class="card-header">
                    <h5 class="text-muted"> Nom du produit :  <span class="text-info"><?= $params['info'][0]->product ?></span></h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-muted">Format  : <span class="text-primary"><?= $params['info'][0]->format ?></span></h5>
                    <h5 class="card-title text-muted">Categorie  : <span class="text-primary"><?= $params['info'][0]->categories ?></span></h5>
                    <h5 class="card-title text-muted">Nombre de carton  : <span class="text-primary"><?= $params['info'][0]->carton ?></span></h5>
                    <h5 class="card-title text-muted">Nombre de pieces par le carton  : <span class="text-primary"><?= $params['info'][0]->npcarton ?></span></h5>
                    <h5 class="card-title text-muted">Prix d'achat par piece  : <span class="text-primary"><?= $params['info'][0]->price ?></span></h5>
                    <h5 class="card-title text-muted">Description du produit :  <span class="text-primary"><?= $params['info'][0]->comment ?></span></h5>
                    

                  
                </div>

                <div class="card-footer">
                   <span class=" text-hide">Créer le : <?= $params['info'][0]->datecreate ?> </span>
                   
                </div>
            
            </div>  
        </div>
    </div>
</div>
