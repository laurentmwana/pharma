<h4 class="text-secondary"> Modification de la categorie (<span class="text-info"><?=  $params['index'][0]->categories ?>)</span> </h4>



<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="/blog/categories/add" class="btn btn-secondary btn-sm" ><i class="fa fa-plus"></i> </a>
                <a href="/blog/categories/listing" class="btn btn-secondary shadow btn-sm"><i class="fa fa-table"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="" class="btn btn-secondary shadow btn-sm"><i class="fa fa-print"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <?php
            $title = "Categories";
            if (isset($params['update'])){
                $alert = new  App\Alert\AlertMessage($params['update']);
                $alert->message(); 
            }
            ?>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-8">
            <form action="/blog/Categories/Update/<?= $params['index'][0]->id ?>" method="post" class="form">
                <div class="form-group mb-3">
                    <label for="titre" class="form-label"> Titre </label>
                    <input type="text" class="form-control" name="title" value="<?=  $params['index'][0]->title?>">
                </div>

                <div class="form-group mb-3">
                    <label for="legend" class="form-label"> Legende </label>
                    <input type="text" class="form-control" name="legend" value="<?=  $params['index'][0]->legend ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="Categorie" class="form-label"> Categorie </label>
                    <input type="text" class="form-control" name="categories" value="<?=  $params['index'][0]->categories ?>">
                </div>

                <button class="btn btn-primary" name="valided" type="submit"><i class="fa fa-edit"></i> Modifier </button>
                <button class="btn btn-secondary" type="reset"><i class="fa fa-reset"></i> Reinitialiser</button>

            </form>
        </div>
    </div>
</div>