<!DOCTYPE html>
<html lang="es">

<head>

    <title>Registrarse</title>

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
        <?php
        if (isset($_SESSION["registro"])) {
            if ($_SESSION["registro"]["flag"]) {
                echo Utils::alert("Se a registrado con exito");
            } else {
                echo Utils::alert("Error!", $_SESSION["registro"]["mensaje"], "danger");
            }
            unset($_SESSION["registro"]);
        }
        ?>
        <div class="row my-5">
            <div class="col-md-6 mx-auto p-0">
                <form action="<?= base_url . 'index.php?controller=usuario&action=save' ?>" method="POST" class="card">
    
                    <div class="card-header">
                        <h1 class="display-4 text-center">Registrate</h1>
                    </div>
    
                    <div class="card-body row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre*</label>
                                <input type="text" name="nombre" id="name" class="form-control" placeholder="Ingrese su nombre">
                            </div>
    
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su email">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellido*</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese su apellido">
                            </div>
    
                            <div class="form-group">
                                <label for="password">Contraseña*</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="********">
                            </div>
                        </div>
                    </div>
    
                    <div class="col mb-3 ml-2">
                        <button class="btn btn-success btn-block" name="submitRegistro" type="submit">Registrarme</button>
                    </div>
    
                </form>
            </div>
        </div>
    </main>
    
    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../layout/footer.php" ?>

    <!-- SCRIPTS BOOTSTRAP -->
    <?php require_once __DIR__ . "/../layout/scriptBootstrap.php" ?>
</body>

</html>

