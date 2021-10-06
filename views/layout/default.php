<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?=SCRIPTS ."vendor" . DIRECTORY_SEPARATOR .  "css" . DIRECTORY_SEPARATOR  . "bootstrap.min.css" ?>">
    <link rel="stylesheet" href=" <?=SCRIPTS ."vendor" . DIRECTORY_SEPARATOR .  "fontawesome-free-5.15.3-web" . DIRECTORY_SEPARATOR . "css" . DIRECTORY_SEPARATOR . "all.css" ?>">
    <title>PharMa - <?= isset($title) ? $title : "Accueil"  ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Phar<span class="text-primary">Ma</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">Accueil</a>
          </li>

            <li class="nav-item">
                <a class="nav-link" href="/blog/categories/listing">Categorie</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/blog/format/Listing">Format</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/blog/stock/listing">Stock</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/blog/vente/add">Vendre</a>
            </li>


        </ul>
      </div>
    </div>
  </nav>

  <div class="container m-4">
      <?= $content ?>
  </div>

<script src="<?= SCRIPTS . "vendor" . DIRECTORY_SEPARATOR . "js" . DIRECTORY_SEPARATOR . "jquery.min.js"  ?>"></script>
<script src="  <?=SCRIPTS . "js" . DIRECTORY_SEPARATOR . "app.js" ?>"></script>

  <script src="<?= SCRIPTS . "vendor" . DIRECTORY_SEPARATOR . "js" . DIRECTORY_SEPARATOR . "bootstrap.bundle.min.js"  ?>"></script>
  <script src="  <?=SCRIPTS . "vendor" . DIRECTORY_SEPARATOR . "fontawesome-free-5.15.3-web" . DIRECTORY_SEPARATOR . "js" . DIRECTORY_SEPARATOR . "all.js" ?>"></script>
</body>
</html>