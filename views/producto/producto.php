<!DOCTYPE html>
<html lang="es">
<head>
    
    <title><?=$title?></title>
    
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
    <main class="container my-5">

        <div class="row">
            <!-- IMAGEN -->
            <div class="col-md-5 text-center">
                <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="Imagen" class="img-fluid imgProducto">
            </div>

            <!-- DATOS -->
            <div class="col-md-7">
                <h1 class="text-center text-md-left display-4 titulo-producto"><?=ucfirst($producto->nombre)?></h1>
                <h2 class="text-center text-md-left display-4 precio-producto">$<?=$producto->precio?></h2>
                <p class="text-center text-md-left"><strong>12</strong> cuotas sin interés de <strong>$<?=round($producto->precio/12,2)?></strong></p>

                <!-- TARJETAS -->
                <ul class="mediosDePagoProducto justify-content-center justify-content-md-start">
                    <li>
                        <img src="<?=base_url?>assets/img/visa@2x.png" alt="tarjeta visa" class="img-fluid tarjetaBancaria">
                    </li>
                    <li>
                        <img src="<?=base_url?>assets/img/mastercard@2x.png" alt="tarjeta mastercard" class="img-fluid tarjetaBancaria">
                    </li>
                    <li>
                        <img src="<?=base_url?>assets/img/amex@2x.png" alt="tarjeta american express" class="img-fluid tarjetaBancaria">
                    </li>
                    <li class="my-auto ml-2">
                        <i class="fas fa-plus"></i>
                    </li>
                </ul>
                <p class="text-secondary text-center text-md-left">
                    <strong>10% de descuento</strong> pagando con Transferencia o Deposito Bancario (enviar comprobante)
                </p>
                
                <hr> <!-- SEPARADOR -->
                
                <!-- DESCRIPCION DEL PRODUCTO -->
                <p class="title-descripcion-producto">Descripcion del producto</p>
                <p><?=ucfirst($producto->descripcion)?></p>

                <!-- TALLAS -->
                <p class="text-tallas-disponibles">Tallas displonibles:</p>
                <div class="contenedor-Tallas">
                    <div>S</div>
                    <div>M</div>
                    <div>L</div>
                    <div>XL</div>
                </div>

                <!-- BOTONES -->
                <div class="row mt-1">
                    <div class="col-md-6 mt-3">
                        <button class="btn btn-success btn-block boton-producto">COMPRAR</button>
                    </div>
                    <div class="col-md-6 mt-3">
                        <button class="btn btn-dark btn-block boton-producto">AGREGAR AL CARRITO</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../layout/footer.php"?>
    
    <!-- SCRIPTS BOOTSTRAP -->
    <?php require_once __DIR__ . "/../layout/scriptBootstrap.php"?>
</body>
</html>