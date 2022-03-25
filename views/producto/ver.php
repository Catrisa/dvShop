
<!DOCTYPE html>
<html lang="es">
<head>
    
    <title>Lista de productos</title>
    
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
    <main class="container my-3">
        <div class="row ">
            <?php if( isset($_SESSION["productoGuardado"]) ){
                echo '<div class="col-12">';
                    echo Utils::alert($_SESSION["productoGuardado"]);
                echo '</div>';
                unset($_SESSION["productoGuardado"]);
            }
            if( isset($_SESSION["update"]) && $_SESSION["update"]["flag"] ){
                echo '<div class="col-12">';
                    echo Utils::alert($_SESSION["update"]["message"]);
                echo '</div>';
                unset ($_SESSION["update"]);
            }
            if( isset($_SESSION["login"]) && $_SESSION["login"]["flag"] ){
                echo '<div class="col-12">';
                    echo Utils::alert($_SESSION["login"]["message"],"Tenes permisos de Administrador");
                echo '</div>';
                unset ($_SESSION["login"]);
            }
            if( isset($_SESSION["delete"])){
                if( $_SESSION["delete"]["flag"] ){
                    $message = $_SESSION["delete"]["message"];
                    $color = "warning";
                }else{
                    $message = $_SESSION["delete"]["message"];
                    $color = "danger";
                }
                echo '<div class="col-12">';
                    echo Utils::alert($message,"",$color);
                echo '</div>';
                unset ($_SESSION["delete"]);
            }
            ?>
            <div class="col-12 mb-3">
                <h1 class="display-4">Productos</h1>
            </div>
    
            <div class="col-md-2 mb-4">
                <a href="<?=base_url.'index.php?controller=producto&action=create'?>" class="btn btn-success btn-block">Agregar</a>
            </div>
    
            <div class="col-12">
            <table class="table table-striped tabla-lista-productos">
                <thead>
                    <tr>
                        <th class="d-none d-md-block ">Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th class="d-none d-md-block">Categoria</th>
                        <th colspan="2" class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productos as $producto): ?>
                        <tr class="tr-lista-productos">
                            <td class="align-middle text-center d-none d-md-block ">
                                <img src="<?=base_url."uploads/images/".$producto->imagen?>" alt="<?=$producto->nombre?>" class="img-fluid img-lista-productos">
                            </td>
                            <td class="align-middle text-center"><?=ucfirst($producto->nombre)?></td>
                            <td class="align-middle text-center"><?=ucfirst($producto->precio)?></td>
                            <td class="align-middle text-center d-none d-md-block "><?=$producto->categoria?></td>
                            <td class="align-middle text-center">
                                <a class="btn btn-primary btn-block" href="<?=base_url.'index.php?controller=producto&action=edit&id='.$producto->id?>"><i class="fas fa-marker"></i></a>
                            </td>
                            <td class="align-middle text-center">
                                <a class="btn btn-danger btn-block" href="<?=base_url.'index.php?controller=producto&action=delete&id='.$producto->id?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            </div>
    
            <div class="col-12 pt-4">
                <?php echo $paginador->getPaginador() ?>
            </div>
        </div>
    </main>


    <!-- FOOTER -->
    <?php require_once __DIR__ . "/../layout/footer.php"?>
     
    <!-- SCRIPTS BOOTSTRAP -->
    <?php require_once __DIR__ . "/../layout/scriptBootstrap.php"?>
</body>
</html>
