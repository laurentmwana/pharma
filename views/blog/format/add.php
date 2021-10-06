<h4 class="text-dark">Ajouter un  format </h4>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group m-4">
            <a href="/blog/format/listing" class="btn btn-dark shadow btn-sm"><i class="fa fa-table"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <?php
            $title = "format";
            if (isset($params['add'])){
                $alert = new  App\Alert\AlertMessage($params['add']);
                $alert->message(); 
            }
            ?>
        </div>
    </div>
</div>
<hr class="divide">
<div class="row">
    <div class="col-md-8">
        <form action="/blog/format/add" method="post">
            <div class="form-group mb-3">
                <label for="title" class="form-label"> Titre </label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group mb-3">
                <label for="legend" class="form-label"> Legende </label>
                <input type="text" class="form-control" name="legend">
            </div>

            <div class="form-group mb-3">
                <label for="format" class="form-label"> format </label>
                <input type="text" class="form-control" name="format">
            </div>

            <button class="btn btn-primary" name="valided" type="submit"><i class="fa fa-plus"></i> Ajouter</button>
            <button class="btn btn-dark" type="reset"><i class="fa fa-reset"></i> Reinitialiser</button>

        </form>
    </div>
</div>
