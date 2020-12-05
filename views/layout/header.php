
<header>
  <?php if (!isset($_SESSION["identity"])) : ?>
    <div class="container">
      <a href="<?= base_url . 'index.php?controller=usuario&action=login' ?>"><i class="fas fa-user-circle"></i></a>
    </div>
  <?php else : ?>
    <div class="container">
      <a href="<?= base_url . 'index.php?controller=usuario&action=logOut' ?>"><i class="fas fa-sign-out-alt"></i></a>
    </div>
  <?php endif; ?>
  <h2 class="display-2 text-center pt-0"><a href="<?= base_url ?>" class="titulo-tienda">Tienda</a></h2>
</header>

