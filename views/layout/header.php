<!doctype html>
<html lang="es">

<head>
  <title>Tienda Ropa</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/deecb3ce02.js" crossorigin="anonymous"></script>

  <!-- Mis estilos CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>

  <header>
    <?php if (!isset($_SESSION["identity"])) : ?>
      <div class="container">
        <a href="<?= base_url . 'index.php?controller=usuario&action=login' ?>">Ingresar</a>
      </div>
    <?php else : ?>
      <div class="container">
        <a href="<?= base_url . 'index.php?controller=usuario&action=logOut' ?>"><i class="fas fa-sign-out-alt"></i></a>
      </div>
    <?php endif; ?>
    <h2 class="display-2 text-center"><a href="<?= base_url ?>" class="titulo-tienda">Tienda</a></h2>
  </header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

      <?php if (!Utils::isAdmin()) : ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <?php endif; ?>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

          <?php
          if (!Utils::isAdmin()) :
            foreach (Utils::showCategorias() as $categoria) : ?>
              <li class="nav-item">
                <a class="nav-link a-navBar" href="<?= base_url . "index.php?controller=producto&action=getForCategoria&categoria=" . $categoria->id ?>">
                  <?= ucfirst($categoria->nombre) ?>
                </a>
              </li>
          <?php
            endforeach;
          endif; ?>

        </ul>

        <form class="form-inline my-2 my-lg-0" action="<?=base_url.'index.php?controller=producto&action=search'?>" method="POST">
          <input class="form-control" type="search" placeholder="Producto..." aria-label="Search" name="producto">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submitBuscador">Buscar</button>
        </form>

      </div>
    </div>
  </nav>