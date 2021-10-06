


<h1 class="text-black-50">Information du produit    </h1>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="/blog/vente/Add" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> </a>
                <a href="/blog/vente/delete/<?= $params['vente'][0]->id ?>" class="btn btn-success shadow btn-sm"><i class="fa fa-trash"></i></a>
                <a href="/blog/vente/update/<?= $params['vente'][0]->id ?>" class="btn btn-success shadow btn-sm"><i class="fa fa-edit"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="/blog/vente/listing" class="btn btn-success shadow btn-sm"><i class="fa fa-table"></i></a>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="" class="btn btn-success shadow btn-sm"><i class="fa fa-print"></i></a>
            </div>
        </div>
    </div>
</div>


<hr>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-light shadow-lg">
                <div class="card-header">
                    <h3 class="text-success">Produit vendu </h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-muted">Format  : <span class="text-success"><?= $params['vente'][0]->format ?></span></h5>
                    <h5 class="card-title text-muted">Categorie  : <span class="text-success"><?= $params['vente'][0]->categories ?></span></h5>
                    <h5 class="card-title text-muted">Nombre de carton  : <span class="text-success"><?= $params['vente'][0]->price ?></span></h5>
                    <h5 class="card-title text-muted">Prix d'achat par piece  : <span class="text-success"><?= $params['vente'][0]->price ?></span></h5>
                </div>

                <div class="card-footer">
                   <span class=" text-hide">Créer le : <?= $params['vente'][0]->datecreated ?> </span>
                   
                </div>
            
            </div>  
        </div>
        <div class="col-md-6">
            <div class="card bg-light shadow-lg">
                <div class="card-header">
                    <h3 class="text-success">Stock du produit </h3>
                </div>
                <div class="card-body">
                <h5 class="text-muted"> Nom du produit :  <span class="text-info"><?= $params['stock'][0]->product ?></span></h5>
                    <h5 class="card-title text-muted">Format  : <span class="text-success"><?= $params['stock'][0]->format ?></span></h5>
                    <h5 class="card-title text-muted">Categorie  : <span class="text-success"><?= $params['stock'][0]->categories ?></span></h5>
                    <h5 class="card-title text-muted">Nombre de carton  : <span class="text-success"><?= $params['stock'][0]->price ?></span></h5>
                    <h5 class="card-title text-muted">Prix d'achat par piece  : <span class="text-success"><?= $params['stock'][0]->price ?></span></h5>
                </div>

                
                <div class="card-footer">
                   <span class=" text-hide">Créer le : <?= $params['stock'][0]->datecreate ?> </span>
                   
                </div>
            
            </div>  
        </div>
    </div>
</div>
