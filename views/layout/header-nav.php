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

  <nav class="navbar navbar-expand-lg navbar-light bg-light barraDeNavegacion">
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

          <?php if (!Utils::isAdmin()): ?>
            <form class="form-inline my-2 my-lg-0" action="<?=base_url.'index.php?controller=producto&action=search'?>" method="POST">
              <input class="form-control" type="search" placeholder="Producto..." aria-label="Search" name="producto">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submitBuscador">Buscar</button>
            </form>
          <?php endif; ?>

      </div>
    </div>
  </nav>