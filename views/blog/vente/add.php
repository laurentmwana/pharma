<h4 class="text-success">Vendre un produit </h4>
<div class="col-md-6">
            <div class="btn-group m-2">
                <a href="/blog/vente/listing" class="btn btn-success btn-sm"><i class="fa fa-table"></i> </a>
            </div>
        </div>
<hr>
<div class="container">


<div class="row">
    <div class="col-md-8">
        <?php

        $title = "vendre";
        if (isset($params['add'])){
            $alert = new  App\Alert\AlertMessage($params['add']);
            $alert->message(); 
        }
        ?>
       <div class="card">
           <div class="card-body">
            <form action="" method="post">
                <div class="row g-3 mb-2">
                    <div class="form-group col-md-4">
                        <label for="product" class="form-label">Nom du Produit </label>
                        <input type="text" class="form-control" name="product">
                    </div>
                    <div class="form-group col-md-4">
                            <label for="format" class="form-label"> Format</label>
                            <select name="format" id="" class="form-control">
                                <option value=""> Choississez un format </option>
                                <?php foreach(App\Models\Model::all('format') as $format): ?>
                                <option value="<?= $format->format  ?>"><?= $format->format  ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="categories" class="form-label">Categories</label>
                            <select name="categories" id="" class="form-control">
                                <option value=""> Choississez une categorie </option>
                                <?php foreach(App\Models\Model::all('categories') as $categories): ?>
                                <option value="<?= $categories->categories  ?>"><?= $categories->categories  ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                </div>

                <div class="row  mb-4">
                    <div class="form-group col-md-6">
                        <label for="price" class="form-label"> Prix de vente  </label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="piece" class="form-label">Nombre de piece </label>
                        <input type="number" class="form-control" name="piece"> 
                    </div>
                </div>

                <button class="btn btn-success" name="valided" type="submit"><i class="fa fa-save"></i> Validation</button>
                <button class="btn btn-success" type="reset"><i class="fa fa-reset"></i> Reinitialiser</button>

            </form>
           </div>
       </div>
    </div>
    <div class="col-md-4">

    </div>
</div>
</div>