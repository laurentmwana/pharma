


<h1 class="text-black-50">Information du format   </h1>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="/blog/format/Add" class="btn btn-secondary btn-sm" ><i class="fa fa-plus"></i> </a>
                <a href="/blog/format/delete/<?= $params['info'][0]->id ?>" class="btn btn-secondary shadow btn-sm"><i class="fa fa-trash"></i></a>
                <a href="/blog/format/update/<?= $params['info'][0]->id ?>" class="btn btn-secondary shadow btn-sm"><i class="fa fa-edit"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="/blog/format/listing" class="btn btn-secondary shadow btn-sm"><i class="fa fa-table"></i></a>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="" class="btn btn-secondary shadow btn-sm"><i class="fa fa-print"></i></a>
            </div>
        </div>
    </div>
</div>


<hr>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-muted"> Titre de la Categorie <span class="text-info"><?= $params['info'][0]->title ?></span></h5>
                </div>
                <div class="card-body">
            
                    <h5 class="card-title text-muted">Nom de la categorie </h5>
                    <p class="card-text text-info"><?= $params['info'][0]->format ?></p>

                    <h5 class="card-title text-muted">Legende de la Categorie  </h5>
                    <p class="card-text text-info"><?= $params['info'][0]->legend ?></p>

                    
                    <h5 class="card-title text-muted">Date de création   </h5>
                    <p class="card-text text-info"><?= $params['info'][0]->datecreate ?></p>

                    
                    <h5 class="card-title text-muted">Derniere modification  </h5>
                    <p class="card-text text-info"><?= $params['info'][0]->updatedate ?></p>
                </div>
            
            </div>  
        </div>
    </div>
</div>
