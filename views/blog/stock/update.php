<h4 class="text-secondary">Modification du stock </h4>
<div class="col-md-6">
            <div class="btn-group m-2">
                <a href="" class="btn btn-primary btn-sm" data-bs-target="#addstock" data-bs-toggle="modal"><i class="fa fa-plus"></i> </a>
                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
            </div>
        </div>
<hr>
<div class="container">

    <div class="row">
        <div class="col-md-9">
            <?php
            $title = "vendre";
            if (isset($params['update'])){
                $alert = new \App\Alert\AlertMessage($params['update']);
                $alert->message();
            }
            ?>
        </div>
    </div>



    <div class="row">
        <div class="card col-md-10">
            <div class="card-body">
                <form action="/blog/stock/Update/<?= $params['index'][0]->id ?>" method="post">
                    <div class="row g-2 mb-1">
                        <div class="form-group col-md-4">
                            <label for="product" class="form-label">Nom du Produit </label>
                            <input type="text" class="form-control" name="product" value="<?= $params['index'][0]->product ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="format" class="form-label"> Format</label>
                            <select name="format" id="" class="form-control">
                                <?php foreach(App\Models\Model::all('format') as $format): ?>
                                <option value="<?= $format->format  ?>"><?= $format->format  ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="categories" class="form-label">Categories</label>
                            <select name="categories" id="" class="form-control">
                                <?php foreach(App\Models\Model::all('categories') as $categories): ?>
                                <option value="<?= $categories->categories  ?>"><?= $categories->categories  ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="row g-2 mb-2">
                        <div class="form-group col-md-8">
                            <label for="price" class="form-label"> Prix d'achat </label>
                            <input type="number" class="form-control" name="price" value="<?= $params['index'][0]->price ?>">
                        </div>

                    </div>

                    <div class="row g-3 mb-2">
                        <div class="form-group col-md-6">
                            <label for="carton" class="form-label"> Nombre de carton</label>
                            <input type="number" class="form-control" name="carton" value="<?= $params['index'][0]->carton ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="npcarton" class="form-label">Nombre de piece par  Carton  </label>
                            <input type="number" class="form-control" name="npcarton" value="<?= $params['index'][0]->npcarton ?>"> 
                        </div>

                    </div>
                    <div class="form-group mb-2">
                        <label for="comment" class="form-label"> Commentaire </label>
                        <textarea name="comment" class="form-control"><?= $params['index'][0]->comment ?> </textarea>
                    </div>

                    <button class="btn btn-primary" name="valided" type="submit"><i class="fa fa-save"></i> Validation</button>
                    <button class="btn btn-primary" type="reset"><i class="fa fa-reset"></i> Reinitialiser</button>
                </form>
            </div>
        </div>
    </div>
</div>