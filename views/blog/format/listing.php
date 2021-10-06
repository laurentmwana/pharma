
<h1 class="text-black-50">Listage du format  </h1>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="/blog/format/add" class="btn btn-dark btn-sm" ><i class="fa fa-plus"></i> </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="btn-group m-4">
                <a href="" class="btn btn-dark shadow btn-sm"><i class="fa fa-print"></i></a>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-9">
            <?php
            use App\Controller\Helper\TextHelper;
            use App\Controller\Pagines\Pagine;
            $title = "format";
            App\Alert\session::getInstance()->attach();
            ?>
        </div>
    </div>
    <hr>

    <!-- Table qui va contenir tous les products vendus  -->
    <div class="row">
        <table class="table table-hover table-bordered table-responsive table-striped">
            <theader>
                <tr>
                    <th class="text-black-50">Titre</th>
                    <th class="text-black-50">Legende</th>
                    <th class="text-black-50">format</th>
                    <th class="text-black-50">Action</th>
                    <th class="text-black-50">Créer le</th>
                </tr>
            </theader>
            <tbody>
            <?php 
            $paginate = new Pagine($title);
            $data = $paginate->items();
            foreach ($data as $post) :?>
                <tr>
                    <td><?=  TextHelper::excerpt($post->title)?></td>
                    <td><?= TextHelper::excerpt($post->legend) ?></td>
                    <td><?= TextHelper::excerpt($post->format) ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="/blog/format/delete/<?= $post->id  ?>" class="btn btn-dark btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="/blog/format/Update/<?= $post->id  ?>" class="btn btn-dark btn-sm "><i class="fa fa-edit"></i></a>
                            <a href="/blog/format/info/<?= $post->id ?>" class="btn btn-dark btn-sm" ><i class="fa fa-info"></i> </a>
                        </div>
                    </td>
                    <td><?= $post->datecreate ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <nav aria-label="Standard pagination example">
                <ul class="pagination pagination-sm">
                    <li class="page-item">
                    <?= $paginate->previous('dark') ?>  
                    </li>
                    <?php $paginate->Listing() ?>
                    <li class="page-item">
                    <?= $paginate->next('dark') ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>