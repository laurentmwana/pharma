
<h2 class="text-info">Ajout du stock </h2>
<div class="container">
    <div class="row">
        <div class="btn-group m-4">
            <div class="col-md-5">
                <a href="/blog/stock/listing" class="btn btn-info shadow btn-sm"><i class="fa fa-table"></i></a>
            </div>
           
        </div>
    </div>

    <div class="row col-md-8">
    <?php

$title = "stock";
    if (isset($params['add'])){
        $alert = new  App\Alert\AlertMessage($params['add']);
        $alert->message(); 
    }
    ?>
    </div>

    <hr class="divide">

    <div class="row">
        <div class="card col-md-10">
            <div class="card-body">
                <form action="/blog/stock/add" method="post">
                    <div class="row g-2 mb-1">
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

                    <div class="row g-2 mb-2">
                        <div class="form-group col-md-8">
                            <label for="price" class="form-label"> Prix d'achat </label>
                            <input type="number" class="form-control" name="price">
                        </div>

                    </div>

                    <div class="row g-3 mb-2">
                        <div class="form-group col-md-6">
                            <label for="carton" class="form-label"> Nombre de carton</label>
                            <input type="number" class="form-control" name="carton">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="npcarton" class="form-label">Nombre de piece par  Carton  </label>
                            <input type="number" class="form-control" name="npcarton"> 
                        </div>

                    </div>
                    <div class="form-group mb-2">
                        <label for="comment" class="form-label"> Commentaire </label>
                        <textarea name="comment" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-primary" name="valided" type="submit"><i class="fa fa-save"></i> Validation</button>
                    <button class="btn btn-info" type="reset"><i class="fa fa-reset"></i> Reinitialiser</button>
                </form>
            </div>
        </div>
    </div>
</div>










