<!DOCTYPE html>
<html lang="es">

<head>

    <title><?= isset($producto) ? "Modificar Producto" : "Agregar Producto" ?></title>

    <!-- META -->
    <?php require_once __DIR__ . "/../layout/meta.php" ?>

    <!-- LINKS -->
    <?php require_once __DIR__ . "/../layout/links.php" ?>

</head>

<body>

    <!-- HEADER -->
    <?php require_once __DIR__ . "/../layout/header.php" ?>

    <!-- NAV -->
    <?php require_once __DIR__ . "/../layout/nav.php" ?>

    <!-- MAIN -->
    <main class="container">
        <div class="row my-4">

            <?php
            if (isset($_SESSION["error"]) && $_SESSION["error"]["flag"]) {
                echo '<div class="col-12 mb-4">';
                echo Utils::alert("", $_SESSION["error"]["message"], "danger");
                echo '</div>';
                unset($_SESSION["error"]);
            }
            ?>

            <!-- TITULO -->
            <div class="col-12 mb-4">
                <?php if (isset($producto)) : ?>
                    <h2 class="display-4">Modificar producto</h2>
                <?php else : ?>
                    <h2 class="display-4">Nuevo producto</h2>
                <?php endif; ?>
            </div>

            <!-- FORMULARIO -->
            <div class="col-12">
                <form <?php if (!isset($producto)) : ?> action="<?= base_url . 'index.php?controller=producto&action=save' ?>" <?php else : ?> action="<?= base_url . 'index.php?controller=producto&action=update' ?>" <?php endif; ?> method="POST" enctype="multipart/form-data">

                    <?php if (isset($producto)) : ?>
                        <input type="hidden" name="id" value="<?= $producto->id ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control" value="<?= isset($producto) ? $producto->nombre : "" ?>" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio*</label>
                        <input type="number" class="form-control" value="<?= isset($producto) ? $producto->precio : "" ?>" name="precio" id="precio" placeholder="Ingrese el precio" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripcion*</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="4" placeholder="Ingrese una descripcion del producto" required><?= isset($producto) ? $producto->descripcion : "" ?></textarea>
                    </div>

                    <div class="form-group">
                        <select class="custom-select" name="categoriaId" required>

                            <?php if (!isset($producto)) : ?>
                                <!-- PARA CREAR PRODUCTOS -->
                                <option value="" selected>-- Seleccione una categoria --</option>
                                <?php foreach (Utils::showCategorias() as $categoria) : ?>
                                    <option value="<?= $categoria->id ?>"><?= $categoria->nombre ?></option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <!-- PARA EDITAR PRODUCTOS -->
                                <?php foreach (Utils::showCategorias() as $categoria) :
                                    if ($categoria->id == $producto->categoria_id) : ?>
                                        <option value="<?= $categoria->id ?>" selected>Categoria actual --> <?= $categoria->nombre ?></option>
                                    <?php else : ?>
                                        <option value="<?= $categoria->id ?>"><?= $categoria->nombre ?></option>
                                <?php endif;
                                endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="img" id="customFile" <?= isset($producto) ? "" : "required" ?>>
                        <label class="custom-file-label" for="customFile"><?= isset($producto) ? "Nueva imagen..." : "Ingrese una imagen...*" ?></label>
                    </div>

                    <button type="submit" class="btn btn-success mt-4" name="submitCrear"><?= isset($producto) ? "Actualizar" : "Agregar" ?></button>
                </form>
            </div><!-- FIN FORMULARIO -->
        </div>
    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../layout/footer.php" ?>

    <!-- SCRIPTS BOOTSTRAP -->
    <?php require_once __DIR__ . "/../layout/scriptBootstrap.php" ?>
</body>

</html>