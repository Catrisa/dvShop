<!DOCTYPE html>
<html lang="es">
<head>
    
    <title>Iniciar Sesion</title>
    
    <!-- META -->
    <?php require_once __DIR__ . "/../layout/meta.php" ?>
    
    <!-- LINKS -->
    <?php require_once __DIR__ . "/../layout/links.php" ?>

</head>
<body>
    
    <!-- HEADER -->
    <?php require_once __DIR__ ."/../layout/header.php" ?>
    
    <!-- NAV -->
    <?php require_once __DIR__ ."/../layout/nav.php" ?>

    <!-- MAIN -->
    <main class="container">
        <div class="row">
            <div class="col-md-4 mx-auto py-5">
                <?php 
                    if(isset($_SESSION["registro"]) && $_SESSION["registro"]["flag"]){
                        echo Utils::alert("Ya estas registrado!");
                        unset($_SESSION["registro"]);
                    }
                ?>
                <form action="<?=base_url.'index.php?controller=usuario&action=procesarLogin'?>" method="POST" class="card">
                    
                    <div class="card-header">
                        <h1 class="display-4 text-center">Login</h1>
                    </div>
    
                    <div class="card-body">
    
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su email" >
                        </div>
    
                        <div class="form-group mb-3">
                          <label for="password">Contraseña</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="******" >
                        </div>
    
                        <!-- ENLACE PARA REGISTRARSE -->
                        <div class="mt-0 mb-3">
                            <a href="<?=base_url.'index.php?controller=usuario&action=registro'?>" class="text-info">Registrarse</a>
                        </div>

                        <button type="submit" class="btn btn-success btn-block" name="submitIngresar">INGRESAR</button>
                        
                    </div>
    
                </form>
            </div>
        </div>
    </main>
    
    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../layout/footer.php"?>
    
    <!-- SCRIPTS BOOTSTRAP -->
    <?php require_once __DIR__ . "/../layout/scriptBootstrap.php"?>

</body>
</html>